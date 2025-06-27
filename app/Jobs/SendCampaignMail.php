<?php

namespace App\Jobs;

use App\Models\EmailCampaign;
use App\Models\Subscriber;
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
        $emails=Subscriber::whereIn('id',$this->emailIds)->pluck('email','id');
        $newsletter=$this->newsletter;
        foreach ($emails as $key => $email) {

            $campaign=EmailCampaign::where('subscription_id',$key)->where('newsletter_id',$newsletter->id)->first();
            $id=$campaign->id;
             $campaign_id=Str::uuid();
     // Generate the tracking pixel URL
   $trackingPixelUrl = route('email.open', ['campaign_id' => $campaign_id]);


    // Add the tracking pixel image (with display:none) to the content
    $trackingPixel = '<img src="' . $trackingPixelUrl . '" alt=""  width="10" height="10">';


       // Prepare footer HTML
        $footer = '
            <div class="footer" style="font-size: 12px;
      color: #666;
      margin-top: 40px;
      border-top: 1px solid #ddd;
      padding: 20px;background-color:#fff">
              <div>
                <p>
                    ScaleDux Software Innovations Pvt Ltd<br>
                    Registered under the Companies Act, 2013<br>
                    Bengaluru, Karnataka – 560001, India<br>
                    CIN: U62013OD2025PTC049049<br>
                    📞 +91 9606626500 | 🌐 <a href="https://www.scaledux.com">scaledux.com</a> | ✉ <a href="mailto:contact@scaledux.com">contact@scaledux.com</a>
                </p>
                <p>
                    You’re receiving this because you joined the ScaleDux waitlist or used our startup tools.<br>
                    <a href="' . url('privacy-policy') . '">Privacy Policy</a> |
                    <a href="' . url('terms-of-services') . '">Terms of Service</a> |
                    <a href="' . route('unsubscribe', ['uuid' => base64_encode($email)]) . '">Unsubscribe</a>
                </p>
              </div>
            </div>
        ';

        // Append pixel + footer to content
        $modifiedContent = str_replace('</body>', $trackingPixel . $footer . '</body>', $newsletter->content);
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
