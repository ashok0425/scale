<?php

namespace App\Http\Controllers;


use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate();

        return view('page.index', compact('pages'));
    }

    public function create()
    {
        return view('page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required_without:template_name',
            'slug' => 'required_without:template_slug',
            'description' => 'required',
            // 'title' => 'required',
        ]);

        $page = new Page;

        $page->title = $request->title;
        $page->name = $request->name ?? $request->template_name;
        $page->description = $request->description;
        $page->slug = $request->slug ?? $request->template_slug;
        $page->status = $request->status;
        $page->show_on_footer = $request->show_on_footer;
        $page->type = $request->type ?? 1;

        $page->save();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Page  Added',

        ];

        return redirect()->back()->with($notification);
    }

    public function edit(Page $page)
    {
        return view('page.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required_without:template_name',
            'slug' => 'required_without:template_slug',
            'description' => 'required',
            // 'title' => 'required',
        ]);

        $page->title = $request->title;
        $page->name = $request->name ?? $request->template_name;
        $page->description = $request->description;
        $page->slug = $request->slug ?? $request->template_slug;
        $page->status = $request->status;
        $page->type = $request->type ?? 1;
        $page->show_on_footer = $request->show_on_footer;


        $page->save();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Page  updated',

        ];

        return redirect()->back()->with($notification);
    }

    public function show(Page $page) {}

    public function destroy(Page $page)
    {
        $page->delete();
        $notification = [
            'alert-type' => 'success',
            'message' => 'Page  Deleted',
        ];

        return redirect()->route('pages.index')->with($notification);
    }
}
