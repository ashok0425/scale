<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use App\Models\BlogPost; // adjust if your model name is different

class RSSController extends Controller
{
    public function feed()
    {
        $posts = Blog::latest()->take(20)->get(); // Adjust number as needed

        $rss = view('rss.feed', compact('posts'));

        return Response::make($rss, 200, [
            'Content-Type' => 'application/rss+xml'
        ]);
    }
}

