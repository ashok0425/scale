<?php

namespace App\Http\Controllers;


use App\Models\Banner;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        if (! auth()->user()->can('banners:view')) {
            abort(403);
         }

        $banners = Banner::when(!Auth::user()->can('do:anything'),function($query){
               $query->where('user_id',Auth::user()->id);
            })->when(request()->query('type'),function($query){

                    $query->where('type',request()->query('type'));
            })
            ->latest()->paginate();

        return view('banner.index', compact('banners'));
    }

    public function create()
    {
        if (! auth()->user()->can('banners:create')) {
            abort(403);
         }
        return view('banner.create');
    }

    public function store(Request $request)
    {
        if (! auth()->user()->can('banners:create')) {
            abort(403);
         }
        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $banner = new Banner;

        $thumbnail = $request->file('thumbnail')?->store('uploads', 'public') ?? null;
        $banner->thumbnail=$thumbnail;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->status = $request->status??1;
        $banner->is_homepage_banner = $request->is_homepage_banner;
        $banner->type = $request->type??1;

        $banner->save();

        return redirect()->route('banners.index',['type'=>$banner->type])->with('success', 'Banner added successfully');
    }

    public function edit($id)
    {
        if (! auth()->user()->can('banners:edit')) {
            abort(403);
         }
        $banner = Banner::when(
            !Auth::user()->can('do:anything'),function($query){
               $query->where('user_id',Auth::user()->id);
            }

        )->where('id',$id)->firstOrFail();

        return view('banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        if (! auth()->user()->can('banners:edit')) {
            abort(403);
         }
        $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'nullable|string|max:255',
        ]);

        $banner = Banner::where('id',$id)->firstOrFail();

        $thumbnail = $request->file('thumbnail')?->store('uploads', 'public') ?? $banner->thumbnail;
        $banner->thumbnail=$thumbnail;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->is_homepage_banner = $request->is_homepage_banner;
        $banner->status = $request->status??1;
        $banner->save();

        return redirect()->route('banners.index',['type'=>$banner->type])->with('success', 'Banner updated successfully');
    }

    public function show($id)
    {
        $banner = Banner::findOrFail($id);

        return view('banner.show', compact('banner'));
    }

    public function destroy($id)
    {
        if (! auth()->user()->can('banners:delete')) {
            abort(403);
         }
        $banner = Banner::where('id',$id)->firstOrFail();

        // Delete thumbnail
        if ($banner->thumbnail) {
            Storage::delete(str_replace('/storage', 'public', $banner->thumbnail));
        }

        $banner->delete();

        return redirect()->route('banners.index',['type'=>$banner->type])->with('success', 'Banner deleted successfully');
    }
}
