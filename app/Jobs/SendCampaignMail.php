<?php

namespace App\Jobs;

use App\Models\EmailCampaign;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class SendCampaignMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $newsletter;
    public $emailIds;


    public function __construct($newsletter,$emailIds)
    {
        $this->newsletter=$newsletter;
        $this->emailIds=$emailIds;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $emails=Subscription::whereIn('id',$this->emailIds)->pluck('email','id');
        $newsletter=$this->newsletter;
        foreach ($emails as $key => $email) {

            $campaign=EmailCampaign::where('subscription_id',$key)->where('newsletter_id',$newsletter->id)->first();
            $id=$campaign->id;
             $campaign_id=Str::uuid();
     // Generate the tracking pixel URL
   $trackingPixelUrl = route('email.open', ['campaign_id' => $campaign_id]);


    // Add the tracking pixel image (with display:none) to the content
    $trackingPixel = '<img src="' . $trackingPixelUrl . '" alt=""  width="10" height="10">';
    $modifiedContent = str_replace('</body>', $trackingPixel . '</body>', $newsletter->content);

            Mail::html($modifiedContent, function ($message) use ($email,$newsletter) {
                $message->to($email)
                        ->subject($newsletter->title);
            });


                $campaign->deliver_at=now();
                $campaign->campaign_id=$campaign_id;
                $campaign->save();

        }
    }
}
