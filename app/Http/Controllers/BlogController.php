<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Blog::query()
            ->accessibleBy(Auth::user())
            ->when($request->status != '' || $request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->category, function ($query) use ($request) {
                $query->whereIn('category_id', $request->category);
            })

            ->when($request->keyword, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'LIKE', '%' . $request->keyword . '%')->orwhere('long_description', 'LIKE', '%' . $request->keyword . '%');
                });
            })
            ->when($request->dates, function ($query) use ($request) {
                $dates = explode(' - ', $request->dates);
                if (count($dates) === 2) {
                    try {
                        $start = \Carbon\Carbon::createFromFormat('m/d/Y', trim($dates[0]))->startOfDay();
                        $end = \Carbon\Carbon::createFromFormat('m/d/Y', trim($dates[1]))->endOfDay();

                        $query->whereBetween('created_at', [$start, $end]);
                    } catch (\Exception $e) {
                        // Optionally log the error or ignore invalid dates
                    }
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(20);

        $categories = Category::latest()->get();
        // dd($request->all());
        return view('blog.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'long_description' => 'required',
        ]);

        $post = new Blog();
        // $category=Category::find($request->category);

        $thumbnail = $request->file('thumbnail')?->store('uploads', 'public') ?? null;
        $cover = $request->file('cover')?->store('uploads', 'public') ?? null;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->short_description = $request->short_description;
        $post->long_description = $request->long_description;
        $post->category_id = $request->category;
        $post->status = $request->status ?? $post->status;
        $post->thumbnail = $thumbnail;
        $post->user_id = Auth::user()->id;
        $post->cover = $cover;
        $post->save();

        if ($request->popup) {
            $pop_thumbnail = $request->file('pop_thumbnail')?->store('uploads', 'public') ?? null;

            $popup = new Popup();
            $popup->blog_id = $post->id;
            $popup->button_text = $request->button_text;
            $popup->button_link = $request->button_link."/$post->id";
            $popup->image = $pop_thumbnail;
            $popup->text1 = $request->text1;
            $popup->text2 = $request->text2;
            $popup->text3 = $request->text3;
            $popup->text4 = $request->text4;
            $popup->save();
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Post  Added',
        ];

        return redirect()->back()->with($notification);
    }

    public function edit(Blog $post)
    {
        if (!Blog::accessibleby(Auth::user())->where('id', $post->id)->first()) {
            $notification = [
                'alert-type' => 'error',
                'message' => 'unauthorized Request',
            ];
            return redirect()->route('blogs.index')->with($notification);
        }
        $categories = Category::latest()->get();
        $popup=$post->popup;
        return view('blog.edit', compact('post', 'categories','popup'));
    }

    public function update(Request $request, Blog $post)
    {
        $request->validate([
            'title' => 'required',
            'long_description' => 'required',
        ]);

        $thumbnail = $request->file('thumbnail')?->store('uploads', 'public') ?? $post->thumbnail;
        $cover = $request->file('cover')?->store('uploads', 'public') ?? $post->thumbnail;

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->short_description = $request->short_description;
        $post->long_description = $request->long_description;
        $post->thumbnail = $thumbnail;
        $post->status = $request->status ?? $post->status;
        $post->category_id = $request->category;
        $post->cover = $cover;
        $post->save();

        if ($request->popup) {
            $pop_thumbnail = $request->file('pop_thumbnail')?->store('uploads', 'public') ?? null;
            $popup = Popup::find($post->popup?->id);

            if(!$popup)
            $popup=new Popup();

            $popup->blog_id = $post->id;
            $popup->button_text = $request->button_text;
            $popup->button_link = $request->button_link."/$post->id";
            $popup->image = $pop_thumbnail;
            $popup->text1 = $request->text1;
            $popup->text2 = $request->text2;
            $popup->text3 = $request->text3;
            $popup->text4 = $request->text4;
            $popup->save();
        } else {
            $post->popup()->delete();
        }

        $notification = [
            'alert-type' => 'success',
            'message' => 'Post  updated',
        ];

        return redirect()->route('blogs.index')->with($notification);
    }

    public function show(Blog $post)
    {
        return view('blog.show', compact('post'));
    }

    public function destroy(Blog $post)
    {
        if (!Blog::accessibleby(Auth::user())->where('id', $post->id)->first()) {
            $notification = [
                'alert-type' => 'error',
                'message' => 'unauthorized Request',
            ];
            return redirect()->route('blogs.index')->with($notification);
        }

        $post->delete();
        $notification = [
            'alert-type' => 'success',
            'message' => 'Post  Deleted',
        ];

        return redirect()->route('blogs.index')->with($notification);
    }
}
