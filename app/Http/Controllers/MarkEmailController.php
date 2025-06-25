<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmailCampaign;
use Illuminate\Support\Facades\Log;

class MarkEmailController extends Controller
{
    public function __invoke($campaign_id)
    {
            EmailCampaign::where('campaign_id',$campaign_id)->update([
                'seen_at'=>now()
            ]);
  // Transparent 1x1 pixel (GIF)
    $pixel = base64_decode('R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==');

    return response($pixel)
    ->header('Content-Type', 'image/gif')
    ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');


    }

}
