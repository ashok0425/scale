<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Request;

class HomeController extends Controller
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
        $categories=Category::whereHas('blogs')->where('status',1)->latest()->get();
        $blogs=Blog::where('status',1)->latest()->get();
        $featureBlog=Blog::with('category')->where('status',1)->where('feature_post',1)->latest()->first();
        $featuresPost=Blog::with('category')->where('status',1)->where('feature_post',1)->latest()->skip(1)->limit(3)->get();
        $features=Blog::with('category')->where('status',1)->where('feature_post',1)->latest()->skip(4)->limit(4)->get();
        return view('frontend.blog',compact('categories','blogs','featureBlog','featuresPost','features'));
    }
}
