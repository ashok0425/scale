<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Crm;
use App\Models\Subscriber;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function priorityAccess()
    {
        return view('frontend.form');
    }

    public function storePriorityAccess(Request $request)
    {
       $validated= $request->validate([
        'full_name' => 'required',
        'email' => 'required|email|unique:subscribers,email',
        'role' => 'required|in:founder,freelancer,investor,mentor',
        'phone' => 'required',
        'linkedin' => 'nullable',
        'city' => 'required',
        'message' => 'required',

    ]);
    try {
        $page = parse_url(url()->previous(), PHP_URL_PATH);

       $waitlist=new Crm();
       $waitlist->name=$validated['full_name'];
       $waitlist->email=$validated['email'];
       $waitlist->role=$validated['role'];
       $waitlist->phone=$validated['phone'];
       $waitlist->city=$validated['city'];
       $waitlist->linkedin=$validated['linkedin'];
       $waitlist->message=$validated['message'];
       $waitlist->page=$page;
       $waitlist->type=2;
       $waitlist->save();

        return back()->with('message', 'Thank you for joining our waitlist.')->with('type', 'success');

    } catch (\Exception $e) {
        // Log error if needed
        return back()->with('message', 'Something went wrong. Please try again.')->with('type', 'error');
    }
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

    public function blogDetail($slug){
        $blog=Blog::with('category')->where('status',1)->where('slug',$slug)->firstOrFail();
        $blogs=Blog::where('category_id',$blog->category_id)->limit(5)->get();
     $data = $this->generateTableOfContents($blog->long_description);
$toc = $data['toc'];
$blog->long_description = $data['content'];

        return view('frontend.blog-detail',compact('blog','blogs','toc'));
    }

    function generateTableOfContents($html)
{
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Suppress HTML5 warnings
    $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

    $toc = [];
    $headings = ['h1', 'h2', 'h3'];

    foreach ($headings as $tag) {
        $nodes = $dom->getElementsByTagName($tag);
        foreach ($nodes as $node) {
            $text = $node->textContent;
            $id = Str::slug($text);
            $node->setAttribute('id', $id); // Add anchor ID to heading tag
            $toc[] = [
                'text' => $text,
                'tag' => $tag,
                'id' => $id,
            ];
        }
    }

    $modifiedHtml = $dom->saveHTML();

    return ['toc' => $toc, 'content' => $modifiedHtml];
}

public function subscribe(Request $request)
{
   $validate= $request->validate([
        'email' => 'required|email|unique:subscribers,email',
    ]);
    try {
        Subscriber::updateOrCreate([
            'email' => $validate['email']
        ]);

        return back()->with('message', 'Thank you for subscribing our newsletter.')->with('type', 'success');

    } catch (\Exception $e) {
        // Log error if needed
        return back()->with('message', 'Something went wrong. Please try again.')->with('type', 'error');
    }
}

public function waitlist(Request $request)
{
   $validated= $request->validate([
        'full_name' => 'required',
        'email' => 'required|email|unique:subscribers,email',
        'role' => 'required|in:founder,freelancer,investor,mentor',
    ]);
    try {
        $page = parse_url(url()->previous(), PHP_URL_PATH);

       $waitlist=new Crm();
       $waitlist->name=$validated['full_name'];
       $waitlist->email=$validated['email'];
       $waitlist->role=$validated['role'];
       $waitlist->page=$page;
       $waitlist->type=1;
       $waitlist->save();

        return back()->with('message', 'Thank you for joining our waitlist.')->with('type', 'success');

    } catch (\Exception $e) {
        // Log error if needed
        return back()->with('message', 'Something went wrong. Please try again.')->with('type', 'error');
    }
}


}
