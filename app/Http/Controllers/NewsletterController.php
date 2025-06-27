<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\SubscriberImport;
use App\Jobs\SendCampaignMail;
use App\Models\EmailCampaign;
use App\Models\EmailGroup;
use Illuminate\Support\Str;
use App\Models\Newsletter;
use App\Models\Subscriber;
use App\Notifications\SendNewsletterScheduleNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (! auth()->user()->can('others:campaign')) {
            notify()->info('You do not have sufficient permissions.');
            return back();
        }

        $newsletters = Newsletter::latest()
        ->when($request->draft,function($query){
            $query->where('status',4);
        })
         ->when(!$request->draft,function($query){
            $query->where('status','!=',4);
        })->paginate(20);

        if ($request->draft) {
        return view('newsletter.draft', compact('newsletters'));

        }
          else{
        return view('newsletter.index', compact('newsletters'));

          }
    }
    public function create(){

        return view('newsletter.create');
    }


    public function show(Request $request,Newsletter $campaign)
{
    $emails = EmailCampaign::with('subscription')
        ->whereHas('subscription', function ($query) use ($request) {
            // Apply search condition for 'email' based on the 'keyword' from request
            if ($request->keyword) {
                $query->where('email', 'LIKE', '%' . $request->keyword . '%');
            }
        })
        ->where('newsletter_id', $campaign->id) // Ensure you're referencing the correct column
        ->when($request->seen_at == 1, function ($q) {
            $q->whereNotNull('seen_at');
        })
        ->when($request->deliver_at == 1, function ($q) {
            $q->whereNotNull('deliver_at');
        })
        ->paginate(20);

    return view('newsletter.show', compact('emails'));
}

    public function store(Request $request){

        $html=$request->htmlContent;
        $processedHtml=$this->processImages($html);

        //create newsletter
        $newsletter=Newsletter::find($request->campaign_id);

        if(!$newsletter)
        $newsletter=new Newsletter();

        $newsletter->subject=$request->subject;
       $newsletter->publish_date=$request->schedule_at??now();
        $newsletter->title=$request->title;
        $newsletter->slug=$request->slug??Str::slug($request->title);
        $newsletter->thumbnail=  $request->file('title_image')?$request->file('title_image')->store('images/newsletter', ['disk' => 's3', 'visibility' => 'public']):null;
        $newsletter->content=$processedHtml;
        $newsletter->status=$request->is_draft=='true'?4:2; //4 draft,2 upcoming,3 completed,1 processing
        $newsletter->title=$request->title;
         $newsletter->type=1;
        $newsletter->preview=json_encode($request->emailJson);
        $newsletter->save();
        if($request->is_draft=='true'){
    return response()->json([
        'campaign_id'=>$newsletter->id
    ]);
        }

        $ids=json_decode($request->group_ids);
        $array_emails=EmailGroup::whereIn('id',$ids)->pluck('email_ids');

        $emails=[];
        foreach ($array_emails as $key => $email) {
            $emails=array_merge($emails,(array) $email);
        }

    // Remove any duplicate email addresses
        $emails = array_unique($emails);

    // Chunk the emails into smaller batches
    $chunks = array_chunk($emails, 100);
    foreach ($chunks as $chunk) {
        // Insert records into the 'campaigns' table for each email in the chunk
        $campaignsData = [];
        foreach ($chunk as $email) {
            $campaignsData[] = [
                'newsletter_id' => $newsletter->id,
                'subscription_id' => $email,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        EmailCampaign::query()->insert($campaignsData);

    }

    }


 public function testMail(Request $request){
    $html=$request->htmlContent;
    $processedHtml=$this->processImages($html);

    Mail::html($processedHtml, function ($message) use ($request) {
        $message->to($request->email)
                ->subject($request->title);

    });

    }

    public function processImages($html)
{
    // Pattern for base64 images
    $pattern = '/<img[^>]+src=["\'](data:image\/[a-zA-Z]+;base64,[^"\']+)["\'][^>]*>/';
    preg_match_all($pattern, $html, $base64Matches);

    // Handle base64 images
    foreach ($base64Matches[1] as $base64Image) {
        if (preg_match('/data:image\/(?<type>[a-zA-Z]+);base64,(?<data>.+)/', $base64Image, $imageData)) {
            $type = $imageData['type'];
            $data = base64_decode($imageData['data']);
            $filename = 'uploads/' . Str::random(10) . '.' . $type;

        Storage::disk('public')->put($filename, $data);

        $newPath = asset('storage/' . $filename);

            $html = str_replace($base64Image, $newPath, $html);
        }
    }

    // Pattern for external image URLs
    $externalPattern = '/<img[^>]+src=["\'](https?:\/\/[^"\']+)["\'][^>]*>/';
    preg_match_all($externalPattern, $html, $externalMatches);

    foreach ($externalMatches[1] as $externalImage) {
        $imageFilename = basename($externalImage);
        $newPath = $this->replaceWithOwnServerImage($externalImage, $imageFilename);
        $html = str_replace($externalImage, $newPath, $html);
    }

    // Remove the last <p>...</p> tag and its content
    $html = preg_replace('/<a[^>]*data-unsubscribe="true"[^>]*>.*?<\/a>/is', '', $html);

    return $html;
}
public function replaceWithOwnServerImage($imageUrl, $imageFilename = null)
{
    // Get image content
    $imageContent = file_get_contents($imageUrl);

    // Generate filename if not provided
    if (!$imageFilename) {
        $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
        $imageFilename = Str::random(40) . '.' . $extension;
    }

    // Define path
    $path = 'uploads/' . $imageFilename;

    // Store to local disk (public folder)
    Storage::disk('public')->put($path, $imageContent);

    // Return full URL
    return asset('storage/' . $path);
}

public function edit(Newsletter $campaign){
    $newsletter=$campaign;
       return view('newsletter.edit', compact('newsletter'));
}

public function import(Request $request){
  $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::queueImport(new SubscriberImport($request->group), $request->file('file'));

    return back();
}

public function storeEmail(Request $request){
  $request->validate([
        'email' => 'required|email'
    ]);

            $subscription=Subscriber::updateOrCreate([
                'email' => $request->email
            ]);
            if ($request->group) {
    $emailGroup = EmailGroup::find($request->group);
    $emailIds = is_array($emailGroup->email_ids) ? $emailGroup->email_ids : json_decode($emailGroup->email_ids, true);
    if (!is_array($emailIds)) {
        $emailIds = [];
    }
    $emailIds[] = $subscription->id;
    $emailGroup->email_ids = $emailIds;
    $emailGroup->save();
            }

    return back();
}

public function updateStatus($id){
    $newsletter=Newsletter::find($id);
  $newsletter->status=4;
  $newsletter->save();

    return back();
}

}
