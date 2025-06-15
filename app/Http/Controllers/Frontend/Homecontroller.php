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
        $categories=Category::where('status',1)->latest()->get();
        $blogs=Blog::where('status',1)->latest()->get();
        return view('frontend.blog',compact('categories','blogs'));
    }
}
