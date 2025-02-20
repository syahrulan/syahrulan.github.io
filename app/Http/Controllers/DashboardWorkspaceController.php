<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardWorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.workspaces.index', [
            'workspaces' => Workspace::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.workspaces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:workspaces',
            'image'=> 'image|file|max:5048',
            'body'=> 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images' , 'public');
        }
        Workspace::create($validatedData);
        return redirect('/dashboard/workspaces')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workspace $workspace)
    {
        return view('dashboard.workspaces.show', [
            'workspace' => $workspace
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workspace $workspace)
    {
        return view('dashboard.workspaces.show', [
            'workspace' => $workspace
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workspace $workspace)
    {
        $rules = [
            'title' => 'required|max:255',
            'slug' => 'required|unique:teams',
            'image'=> 'image|file|max:5048',
            'body'=> 'required'
        ];
        if($request->slug != $workspace->slug){
            $rules['slug'] = 'required|unique:workspaces';
    }
    $validatedData = $request->validate($rules);
    Workspace::where('id', $workspace->id)
    ->update($validatedData);
    return redirect('/dashboard/workspaces')->with('success', 'Photo has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workspace $workspace)
    {
        Workspace::destroy($workspace->id);

        return redirect('/dashboard/workspaces')->with('success', 'Post has been Delete!');
    }
    public function checkSlug(Request $request)
    {
         $slug = SlugService::createSlug(Workspace::class, 'slug',  $request->title);
         return response()->json(['slug' => $slug]);
    }
}
