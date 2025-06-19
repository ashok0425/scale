<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Crm;
use App\Models\Page;
use App\Models\Subscriber;
use DOMDocument;
use DOMXPath;
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

public function blogDetail($slug)
{
    $blog = Blog::with('category')->where('status', 1)->where('slug', $slug)->firstOrFail();
    $blogs = Blog::where('category_id', $blog->category_id)->limit(5)->get();

    $data = $this->extractHeadings($blog->long_description);
    $toc = $data['toc'];
    $blog->long_description = $data['content'];

    return view('frontend.blog-detail', compact('blog', 'blogs', 'toc'));
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


public function pages()
{
    $page=Page::where('slug',request()->path())->firstOrFail();
     return view('frontend.page',compact('page'));
}


public function download()
{
     return view('frontend.download');
}

}
