<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Crm;
use App\Models\Page;
use App\Models\Subscriber;
use App\Notifications\PreAccessNotification;
use App\Notifications\SendAttachmentNotification;
use App\Notifications\SubscriberNotification;
use App\Notifications\WaitlistNotification;
use DOMDocument;
use DOMXPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
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

    public function priorityAccess()
    {
        return view('frontend.form');
    }

    public function storePriorityAccess(Request $request)
    {
  $validated = $request->validate([
    'full_name' => 'required',
    'email' => [
        'required',
        'email',
        Rule::unique('crms')->where(function ($query) use ($request) {
            return $query->where('type', 2);
        }),
    ],
    'role' => 'required|in:founder,freelancer,investor,mentor',
    'phone' => 'required',
    'linkedin' => 'nullable',
    'city' => 'required',
    'message' => 'required',
    'country' => 'required',
], [
    'full_name.required' => "Oops! We’d love to know what to call you. Mind entering your name?",
    'email.required' => "Looks like something’s missing or off — can you double-check your email?",
    'email.email' => "That email doesn’t seem valid — can you double-check?",
    'email.unique' => "Hey again! Looks like you’ve already joined the waitlist. We love that energy!",
    'role.required' => "We’d love to tailor your journey — just let us know who you are to ScaleDux - founder, freelancer, investor, or mentor?",
    'role.in' => "That doesn’t seem right — please select one of the listed roles.",
    'phone.required' => "We’ll need your number to reach you — could you fill that in?",
    'city.required' => "Which city are you in? This helps us personalize your experience.",
    'message.required' => "Tell us a bit about what you're looking for or expecting — we’re listening!",
    'country.required' => "A country helps us stay globally relevant — mind picking one?",
]);

    // try {
        $page = parse_url(url()->previous(), PHP_URL_PATH);

       $access=new Crm();
       $access->name=$validated['full_name'];
       $access->email=$validated['email'];
       $access->role=$validated['role'];
       $access->phone=$validated['phone'];
       $access->city=$validated['city'];
       $access->linkedin=$validated['linkedin'];
       $access->message=$validated['message'];
       $access->country=$validated['country'];
       $access->page=$page;
       $access->type=2;
       $access->save();
Notification::route('mail', $request->email)->notify(new PreAccessNotification($access));

        return back()->with('message', 'Thank you for joining.')->with('type', 'success');

    // } catch (\Exception $e) {
    //     // Log error if needed
    //     return back()->with('message', 'Something went wrong. Please try again.')->with('type', 'error');
    // }
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
   $category=Category::where('slug',$slug)->firstOrFail();
    return view('frontend.category-blog', compact('category','categories'));
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
    Notification::route('mail', $request->email)->notify(new SubscriberNotification());
        return back()->with('message', 'Thank you for subscribing our newsletter.')->with('type', 'success');

    } catch (\Exception $e) {
        // Log error if needed
        return back()->with('message', 'Something went wrong. Please try again.')->with('type', 'error');
    }
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
    try {
        $page = parse_url(url()->previous(), PHP_URL_PATH);

       $waitlist=new Crm();
       $waitlist->name=$validated['full_name'];
       $waitlist->email=$validated['email'];
       $waitlist->role=$validated['role'];
       $waitlist->page=$page;
       $waitlist->type=1;
       $waitlist->save();
     Notification::route('mail', $request->email)->notify(new WaitlistNotification($waitlist));
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


public function attachment($attachment_id,$blog_id=null)
{
    $attachment=Attachment::where('uuid',$attachment_id)->firstOrFail();
     return view('frontend.download',compact('attachment'));
}

public function SaveAttachment(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'attachment_id' => 'required'
    ]);

    $link = route('link.attachment', ['attachment_id' => $request->attachment_id]);

    $crm = new Crm();
    $crm->email = $request->email;
    $crm->name = $request->name;
    $crm->type = 3;
    $crm->attachment_link = $link;
    $crm->save();

    $encodedId = base64_encode($request->attachment_id);

    $downloadLink = URL::signedRoute('attachment.download.file', [
    'encoded_id' => $encodedId,
    'token' => uniqid(),
]);

    Notification::route('mail', $request->email)->notify(new SendAttachmentNotification($downloadLink));

    return back()->with('message', 'Check your email. We have sent a download link to your email.')
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


}
