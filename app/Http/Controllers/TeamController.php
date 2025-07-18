<?php

namespace App\Http\Controllers;


use App\Models\Team;
use Auth;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        if (! auth()->user()->can('banners:view')) {
            abort(403);
         }

        $teams = Team::when(!Auth::user()->can('do:anything'),function($query){
               $query->where('user_id',Auth::user()->id);
            })->when(request()->query('type'),function($query){

                    $query->where('type',request()->query('type'));
            })
            ->latest()->paginate();

        return view('team.index', compact('teams'));
    }

    public function create()
    {
        if (! auth()->user()->can('banners:create')) {
            abort(403);
         }
        return view('team.create');
    }

    public function store(Request $request)
    {
        if (! auth()->user()->can('banners:create')) {
            abort(403);
         }
        $request->validate([
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name'=>'required',
            'position'=>'required'
        ]);

        $team = new Team();

        $thumbnail = $request->file('thumbnail')?->store('uploads', 'public') ?? null;
        $team->thumbnail=$thumbnail;
        $team->name = $request->name;
        $team->position = $request->position;
        $team->linkedin = $request->linkedin;
        $team->status = $request->status??1;
        $team->save();

        return redirect()->back()->with(['type'=>'success', 'message'=>'Team added successfully']);
    }

    public function edit($id)
    {
        if (! auth()->user()->can('banners:edit')) {
            abort(403);
         }
        $team = Team::when(
            !Auth::user()->can('do:anything'),function($query){
               $query->where('user_id',Auth::user()->id);
            }

        )->where('id',$id)->firstOrFail();

        return view('team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        if (! auth()->user()->can('banners:edit')) {
            abort(403);
         }
      $team = Team::find($id);

        $thumbnail = $request->file('thumbnail')?->store('uploads', 'public') ?? $team->thumbnail;
        $team->thumbnail=$thumbnail;
        $team->name = $request->name;
        $team->position = $request->position;
        $team->linkedin = $request->linkedin;
        $team->status = $request->status??1;
        $team->save();

        return redirect()->back()->with('success', 'Team updated successfully');
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);

        return view('team.show', compact('team'));
    }

    public function destroy($id)
    {
        if (! auth()->user()->can('banners:delete')) {
            abort(403);
         }
        $team = Team::where('id',$id)->firstOrFail();

        $team->delete();

        return redirect()->back()->with('success', 'Team deleted successfully');
    }
}
