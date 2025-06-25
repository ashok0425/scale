<?php

namespace App\Console\Commands;

use App\Jobs\SendCampaignMail;
use App\Models\Newsletter;
use Illuminate\Console\Command;
use App\Models\EmailCampaign;

class TriggerNewsletter extends Command
{
    protected $signature = 'triggerNewsletter';
    protected $description = 'Send scheduled newsletters to users';

    public function handle()
    {
        $newsletters = Newsletter::where('status', 2)
            ->where('publish_date', '<=', now())
            ->get();
        foreach ($newsletters as $newsletter) {

        $this->info($newsletter->id);
            $chunkSize = 25;
             $newsletter->status = 1; // mark as proccessing
             $newsletter->save();

            EmailCampaign::where('newsletter_id',$newsletter->id)->chunk($chunkSize, function ($campaignChunk) use ($newsletter) {
                $emails = $campaignChunk->pluck('subscription_id')->toArray(); //get aaray of subscriber id
                SendCampaignMail::dispatch($newsletter, $emails); //dispatch job
            });

                    $newsletter->status = 3; // mark as proccessed
                    $newsletter->completed_at = now();
                    $newsletter->save();
        }

    }
}
