<?php

namespace App\Http\Controllers;

use App\Models\Recognition;
use Illuminate\Http\Request;
use Auth;

class RecognitionController extends Controller
{
    public function index()
    {
        if (! auth()->user()->can('banners:view')) {
            abort(403);
        }

        $recognitions = Recognition::when(!Auth::user()->can('do:anything'), function ($query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->when(request()->query('type'), function ($query) {
                $query->where('type', request()->query('type'));
            })
            ->latest()
            ->paginate();

        return view('recognition.index', compact('recognitions'));
    }

    public function create()
    {
        if (! auth()->user()->can('banners:create')) {
            abort(403);
        }

        return view('recognition.create');
    }

    public function store(Request $request)
    {
        if (! auth()->user()->can('banners:create')) {
            abort(403);
        }

        $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $recognition = new Recognition();
        $recognition->thumbnail = $request->file('thumbnail')?->store('uploads', 'public') ?? null;
        $recognition->name = $request->name;
        // $recognition->description = $request->description;
        $recognition->status = $request->status ?? 1;
        $recognition->save();

        return redirect()->back()->with(['type' => 'success', 'message' => 'Recognition added successfully']);
    }

    public function edit($id)
    {
        if (! auth()->user()->can('banners:edit')) {
            abort(403);
        }

        $recognition = Recognition::when(!Auth::user()->can('do:anything'), function ($query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->where('id', $id)
            ->firstOrFail();

        return view('recognition.edit', compact('recognition'));
    }

    public function update(Request $request, $id)
    {
        if (! auth()->user()->can('banners:edit')) {
            abort(403);
        }

        $recognition = Recognition::findOrFail($id);

        $recognition->thumbnail = $request->file('thumbnail')?->store('uploads', 'public') ?? $recognition->thumbnail;
        $recognition->name = $request->name;
        // $recognition->description = $request->description;
        $recognition->status = $request->status ?? 1;
        $recognition->save();

        return redirect()->back()->with('success', 'Recognition updated successfully');
    }

    public function show($id)
    {
        $recognition = Recognition::findOrFail($id);

        return view('recognition.show', compact('recognition'));
    }

    public function destroy($id)
    {
        if (! auth()->user()->can('banners:delete')) {
            abort(403);
        }

        $recognition = Recognition::where('id', $id)->firstOrFail();
        $recognition->delete();

        return redirect()->back()->with('success', 'Recognition deleted successfully');
    }
}
