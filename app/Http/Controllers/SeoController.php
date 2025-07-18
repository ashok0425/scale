<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use Illuminate\Http\Request;
class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seos = Seo::all();
        return view('seo_meta_tags.index', compact('seos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seo_meta_tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $messages = [
            'page_url.required' => 'The page URL is mandatory.',
            'page_url.unique' => 'This page URL already exists. Please choose a different one.',
            'page_url.max' => 'The page URL may not be greater than :max characters.',
            'meta_title.max' => 'The meta title may not be greater than :max characters.',
            'meta_keywords.max' => 'The meta keywords may not be greater than :max characters.',
        ];
        $request->validate([
            'page_url' => 'required|unique:seos,page_url|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable|max:255',
        ],$messages);
        $thumbnail = $request->file('file')?->store('uploads/seo', 'public') ?? null;
         $request['thumbnail']=$thumbnail;

        Seo::create($request->all());


        return redirect()->back()
                         ->with('success', 'SEO Meta Tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seo $Seo)
    {
        return view('seo_meta_tags.show', compact('Seo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seo $seo)
    {
        return view('seo_meta_tags.edit', compact('seo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seo $Seo)
    {
         $messages = [
            'page_url.required' => 'The page URL is mandatory.',
            'page_url.unique' => 'This page URL already exists. Please choose a different one.',
            'page_url.max' => 'The page URL may not be greater than :max characters.',
            'meta_title.max' => 'The meta title may not be greater than :max characters.',
            'meta_keywords.max' => 'The meta keywords may not be greater than :max characters.',
        ];
        $request->validate([
            'page_url' => 'required|max:255|unique:seos,page_url,' . $Seo->id,
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable|max:255',
        ],$messages);

          $thumbnail = $request->file('file')?->store('uploads/seo', 'public') ?? null;
          if ($thumbnail) {
         $request['thumbnail']=$thumbnail;
          }
        $Seo->update($request->all());

        return redirect()->back()
                         ->with('success', 'SEO Meta Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seo $Seo)
    {
        $Seo->delete();

        return redirect()->back()
                         ->with('success', 'SEO Meta Tag deleted successfully.');
    }
}

