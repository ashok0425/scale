<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Crm;
use App\Models\EmailCampaign;
use App\Models\EmailGroup;
use App\Models\Page;
use App\Models\Subscriber;
use App\Notifications\SendAttachmentNotification;
use App\Notifications\SubscriberNotification;
use App\Notifications\WaitlistNotification;
use DOMDocument;
use DOMXPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use URL;

class FrontController extends Controller
{



    public function index()
    {
        return view('frontend.index');
    }

    public function freelancer()
    {
        return view('frontend.freelancer');
    }

    public function investor()
    {
        return view('frontend.investor');
    }

    public function founder()
    {
        return view('frontend.founder');
    }


    public function blog(Request $request)
    {
        $categories = Category::whereHas('blogs')
            ->where('status', 1)
            ->latest()
            ->get();

        $sort = $request->get('sort', 'latest');
        $sortDirection = $sort === 'oldest' ? 'asc' : 'desc';

        // All featured blogs sorted
        $allFeaturedBlogs = Blog::with('category')
            ->where('status', 1)
            ->where('feature_post', 1)
            ->orderBy('created_at', $sortDirection)
            ->get();

        // Slice featured blogs based on position
        $featureBlog = $allFeaturedBlogs->first();
        $featuresPost = $allFeaturedBlogs->slice(1, 3);
        $features = $allFeaturedBlogs->slice(4, 4);

        // All blogs sorted
        $blogs = Blog::with('category')
            ->where('status', 1)
            ->orderBy('created_at', $sortDirection)
            ->paginate(6);

        return view('frontend.blog', compact(
            'categories',
            'blogs',
            'featureBlog',
            'featuresPost',
            'features',
            'sort'
        ));
    }

    public function blogDetail($slug)
    {
        $blog = Blog::with('category')->where('status', 1)->where('slug', $slug)->firstOrFail();
        $blogs = Blog::where('category_id', $blog->category_id)->limit(5)->get();

        $data = $this->extractHeadings($blog->long_description);
        $toc = $data['toc'];
        $blog->long_description = $data['content'];

        return view('frontend.blog-detail', compact('blog', 'blogs', 'toc'));
    }


    public function categoryBlog($slug)
    {
        $categories = Category::whereHas('blogs')
            ->where('status', 1)
            ->latest()
            ->get();
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('frontend.category-blog', compact('category', 'categories'));
    }
    function extractHeadings($html)
    {
        $dom = new \DOMDocument();

        // Suppress warnings due to malformed HTML
        @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

        $headings = [];

        // Get all h2, h3, h4 elements
        $xpath = new \DOMXPath($dom);
        $nodes = $xpath->query('//h2 | //h3 | //h4');

        $toc = [];
        $stack = []; // to keep track of current parent headings

        foreach ($nodes as $node) {
            $tag = $node->nodeName; // h2, h3, or h4
            $text = trim($node->textContent);

            // Generate an ID for anchor link (slugify the text)
            $id = Str::slug($text);

            // Add id attribute to the heading node for linking
            $node->setAttribute('id', $id);

            $item = [
                'title' => $text,
                'id' => $id,
                'children' => []
            ];

            // Hierarchy level based on tag
            $level = intval(substr($tag, 1)); // 2, 3, or 4

            // Build nested TOC structure based on heading levels
            while (!empty($stack) && end($stack)['level'] >= $level) {
                array_pop($stack);
            }

            if (empty($stack)) {
                // Top-level heading (h2)
                $toc[] = $item;
                $stack[] = ['level' => $level, 'ref' => &$toc[count($toc) - 1]];
            } else {
                // Subheading - add as child of last item in stack
                $parent = &$stack[count($stack) - 1]['ref'];
                $parent['children'][] = $item;
                $stack[] = ['level' => $level, 'ref' => &$parent['children'][count($parent['children']) - 1]];
            }
        }

        // Return both the modified HTML (with ids) and the TOC array
        $body = $dom->getElementsByTagName('body')->item(0);
        $contentWithIds = '';
        foreach ($body->childNodes as $child) {
            $contentWithIds .= $dom->saveHTML($child);
        }

        return ['toc' => $toc, 'content' => $contentWithIds];
    }




    public function subscribe(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'subscriber_email' => 'required|email|unique:subscribers,email'
        ], [
            'subscriber_email.required' => "Looks like something’s missing or off — can you double-check your email?",
            'subscriber_email.email' => "Hmm... that doesn’t seem like a valid email address.",
            'subscriber_email.unique' => "Hey again! Looks like you’ve already joined the Newsletter. We love that energy!",

        ]);

        // Handle validation manually
        if ($validator->fails()) {
            return redirect(url()->previous() . '#subscriber-email')
                ->withErrors($validator)
                ->withInput();
        }

        $subscription = Subscriber::updateOrCreate([
            'email' => $request->subscriber_email
        ]);

        $emailGroup = EmailGroup::query()->first();

        $emailIds = is_array($emailGroup->email_ids) ? $emailGroup->email_ids : $emailGroup->email_ids??[];

        if (!is_array($emailIds)) {
            $emailIds = [];
        }

        $emailIds[] = $subscription->id;

        $emailGroup->email_ids = $emailIds;
        $emailGroup->save();
        Notification::route('mail', $request->subscriber_email)->notify(new SubscriberNotification($request->subscriber_email));
        return back()->with('message', 'Thanks for joining ScaleDux.
We’ve got good stuff coming your way')->with('title', 'You’re subscribed! 🎉')->with('type', 'success');
    }

    public function waitlist(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('crms')->where(function ($query) use ($request) {
                    return $query->where('type', 1);
                }),
            ],
            'role' => 'required|in:founder,freelancer,investor,mentor',
        ], [
            'full_name.required' => "Oops! We’d love to know what to call you. Mind entering your name?",

            'email.required' => "Looks like something’s missing or off — can you double-check your email?",
            'email.email' => "Hmm... that doesn’t seem like a valid email address.",
            'email.unique' => "Hey again! Looks like you’ve already joined the waitlist. We love that energy!",

            'role.required' => "We’d love to tailor your journey — just let us know who you are to ScaleDux - founder, freelancer, investor, or mentor?",
            'role.in' => "That doesn’t seem right — please select one of the listed roles.",
        ]);
        // try {
        $page = parse_url(url()->previous(), PHP_URL_PATH);

        $waitlist = new Crm();
        $waitlist->name = $validated['full_name'];
        $waitlist->email = $validated['email'];
        $waitlist->role = $validated['role'];
        $waitlist->page = $page;
        $waitlist->type = 1;
        $waitlist->save();
        Notification::route('mail', $request->email)->notify(new WaitlistNotification($waitlist));
        return back()->with('message', "We’ll keep you posted with early updates and insider drops, exciting things ahead.")->with('type', 'success')->with('title', "🎉Amazing! You’re on the waitlist.");
        // } catch (\Exception $e) {
        //     // Log error if needed
        //     return back()->with('message', 'Something went wrong. Please try again.')->with('type', 'error');
        // }
    }

    public function waitlistStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'footer_full_name' => 'required',
            'footer_email' => [
                'required',
                'email',
                Rule::unique('crms', 'email')->where(function ($query) use ($request) {
                    return $query->where('type', 1);
                }),

            ],
            'footer_role' => 'required|in:founder,freelancer,investor,mentor',
        ], [
            'footer_full_name.required' => "Oops! We’d love to know what to call you. Mind entering your name?",
            'footer_email.required' => "Looks like something’s missing or off — can you double-check your email?",
            'footer_email.email' => "Hmm... that doesn’t seem like a valid email address.",
            'footer_email.unique' => "Hey again! Looks like you’ve already joined the waitlist. We love that energy!",
            'footer_role.required' => "We’d love to tailor your journey — just let us know who you are to ScaleDux - founder, freelancer, investor, or mentor?",
            'footer_role.in' => "That doesn’t seem right — please select one of the listed roles.",
        ]);

        // Handle validation manually
       if ($validator->fails()) {
    if ($request->ajax()) {
        return response()->json([
            'errors' => $validator->errors(),
        ], 422);
    }

    return redirect(url()->previous() . '#waitlist-Section')
        ->withErrors($validator)
        ->withInput();
}
        // try {
        $page = parse_url(url()->previous(), PHP_URL_PATH);

        $waitlist = new Crm();
        $waitlist->name = $request->footer_full_name;
        $waitlist->email = $request->footer_email;
        $waitlist->role = $request->footer_role;
        $waitlist->page = $page;
        $waitlist->type = 1;
        $waitlist->save();
        Notification::route('mail', $request->footer_email)->notify(new WaitlistNotification($waitlist));

        return response()->json([
            'message'=>"We’ll keep you posted with early updates and insider drops, exciting things ahead.",
            'title'=>"🎉Amazing! You’re on the waitlist.",
            'success'=>true,
        ]);
    }


    public function pages($slug)
    {
        $page = Page::where('slug', $slug)->where('status',1)->firstOrFail();
        return view('frontend.page', compact('page'));
    }


    public function attachment($attachment_id, $blog_id = null)
    {
        $attachment = Attachment::where('uuid', $attachment_id)->firstOrFail();
        return view('frontend.download', compact('attachment'));
    }

    public function SaveAttachment(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email'
            ]
        ], [
            'name.required' => "Oops! We’d love to know what to call you. Mind entering your name?",

            'email.required' => "Looks like something’s missing or off — can you double-check your email?",
            'email.email' => "Hmm... that doesn’t seem like a valid email address."
        ]);

        $link = route('link.attachment', ['attachment_id' => $request->attachment_id]);
        $encodedId = base64_encode($request->attachment_id);

        $downloadLink = URL::signedRoute('attachment.download.file', [
            'encoded_id' => $encodedId,
            'token' => uniqid(),
        ]);
        $crm = new Crm();
        $crm->email = $request->email;
        $crm->name = $request->name;
        $crm->type = 3;
        $crm->attachment_link = $downloadLink;
        $crm->save();



        Notification::route('mail', $request->email)->notify(new SendAttachmentNotification($downloadLink, $crm));



        return back()->with('message', 'We’ve sent the download link to your email.
Check your inbox (spam/junk) and enjoy the resource.')->with('title','🎉 Thank you for downloading!')
            ->with('type', 'success');
    }

    public function downloadFile($encoded_id, $token)
    {
        try {
            $attachment_id = base64_decode($encoded_id);
            $attachment = Attachment::where('uuid', $attachment_id)->firstOrFail();

            $filePath = $attachment->attachment; // adjust field name if different

            // if (!Storage::disk('public')->exists($filePath)) {
            //     abort(404, 'File not found.');
            // }

            return Storage::disk('public')->download($filePath, $attachment->original_name ?? $attachment->file_name);
        } catch (\Exception $e) {
            abort(404, 'Invalid or expired download link.');
        }
    }


    public function unsubscribe($uuid){
      $subscribe=Subscriber::where('email',base64_decode($uuid))->firstOrFail();
      if ($subscribe&&$subscribe->is_unsubscribe) {
          return redirect('/')->with('title', "😟 You’re already off the list.
")->with('message', "No emails coming your way.
But hey, if something changes — we’re just one click away")->with('type', 'success');

      }
        return view('frontend.unsubscribe',compact('subscribe'));
    }


     public function unsubscribeStore(Request $request){

        $subscribe=Subscriber::where('email',base64_decode($request->uuid))->firstOrFail();
       $subscribe->update([
        'is_unsubscribe'=>1,
        'reason'=>$request->reason,
        'other_reason'=>$request->other_reason,

       ]);

        // Get the email to be removed
    $emailToRemove = $subscribe->subscription->id ?? null;

    if ($emailToRemove) {
        // Fetch all email groups
        $emailGroups = EmailGroup::all();

        foreach ($emailGroups as $group) {
            $emails = $group->email_ids?? [];

            if (in_array($emailToRemove, $emails)) {
                $updatedEmails = array_values(array_diff($emails, [$emailToRemove]));
                $group->email_ids = json_encode($updatedEmails);
                $group->save();
            }
        }
    }

          return redirect('/')->with('message', "We’ll miss you in the inbox, but we respect your choice.
If you ever want to come back — we’ll be right here.")->with('title', "😔 You're unsubscribed.
")->with('type', 'success');

    }
}
