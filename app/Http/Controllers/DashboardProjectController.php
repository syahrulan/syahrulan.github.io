<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.projects.index', [
            'projects' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:projects',
            'image' => 'image|file|max:2048',
            'body' => 'required',
            'kategori' => 'required'
            
        ]);
        // Simpan gambar
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Project::create($validatedData);
        return redirect('/dashboard/projects')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('dashboard.projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'required|image|file|max:2048',
            'body' => 'required'
        ];

        if ($request->slug != $project->slug) {
            $rules['slug'] = 'required|unique:projects';
        }

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }

        Project::where('id', $project->id)
            ->update($validatedData);
        return redirect('/dashboard/projects')->with('success', 'post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        Project::destroy($project->id);
        return redirect('/dashboard/projects')->with('success', 'Post has been Delete!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Project::class, 'slug',  $request->title);
        return response()->json(['slug' => $slug]);
    }
}
