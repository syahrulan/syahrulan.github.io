<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;



class DashboardTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.teams.index', [
            'teams' => Team::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:teams',
            'image'=> 'image|file|max:5048',
            'jabatan'=> 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images' , 'public');
        }
        
        
     
        
        Team::create($validatedData);
        return redirect('/dashboard/teams')->with('success', 'New post has been added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('dashboard.teams.show', [
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('dashboard.teams.edit', [
            'team'=>$team
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $rules = [
            'title' => 'required|max:255',
            'slug' => 'required|unique:teams',
            'image'=> 'image|file|max:5048',
            'jabatan'=> 'required'
        ];
        if($request->slug != $team->slug){
            $rules['slug'] = 'required|unique:teams';
    }
    $validatedData = $request->validate($rules);
    Team::where('id', $team->id)
    ->update($validatedData);
    return redirect('/dashboard/teams')->with('success', 'Photo has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        Team::destroy($team->id);

        return redirect('/dashboard/teams')->with('success', 'Post has been Delete!');
    }

    public function checkSlug(Request $request)
    {
         $slug = SlugService::createSlug(Team::class, 'slug',  $request->title);
         return response()->json(['slug' => $slug]);
    }
}
