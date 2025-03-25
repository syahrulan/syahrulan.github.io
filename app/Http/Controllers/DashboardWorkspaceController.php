<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardWorkspaceController extends Controller
{
    public function index()
    {
        return view('dashboard.workspaces.index', [
            'workspaces' => Workspace::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.workspaces.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|unique:workspaces,slug',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048', // Gambar utama
        'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:5048', // Gambar tambahan
        'body' => 'required|string',
        'total_rooms' => 'required|integer|min:0',
        'workshop_rooms' => 'required|integer|min:0',
        'classrooms' => 'required|integer|min:0',
    ]);

    $validatedData['body'] = strip_tags($validatedData['body']);

    // Simpan gambar utama jika ada
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('post-images', 'public');
        $validatedData['image'] = $imagePath;
    }

    $workspace = Workspace::create($validatedData);

    // Simpan gambar tambahan jika ada
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('post-images', $filename, 'public');
            $workspace->images()->create(['image' => $path]);
        }
    }

    return redirect('/dashboard/workspaces')->with('success', 'New workspace has been added!');
}



    public function show(Workspace $workspace)
    {
        return view('dashboard.workspaces.show', compact('workspace'));
    }

    public function edit(Workspace $workspace)
    {
        return view('dashboard.workspaces.edit', compact('workspace'));
    }

    public function update(Request $request, Workspace $workspace)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:workspaces,slug,' . $workspace->id,
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar utama
        'images.*' => 'image|mimes:jpg,jpeg,png,webp', // Gambar tambahan
        'body' => 'required',
        'total_rooms' => 'required|integer|min:0',
        'workshop_rooms' => 'required|integer|min:0',
        'classrooms' => 'required|integer|min:0',
    ]);

    $validatedData['body'] = strip_tags($validatedData['body']);

    // Jika ada gambar utama baru, hapus yang lama lalu simpan yang baru
    if ($request->hasFile('image')) {
        if ($workspace->image) {
            Storage::disk('public')->delete($workspace->image);
        }
        $validatedData['image'] = $request->file('image')->store('post-images', 'public');
    }

    $workspace->update($validatedData);

    // Hapus gambar lama dan simpan yang baru untuk koleksi gambar tambahan
    if ($request->hasFile('images')) {
        foreach ($workspace->images as $oldImage) {
            Storage::disk('public')->delete($oldImage->image);
            $oldImage->delete();
        }

        foreach ($request->file('images') as $image) {
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('post-images', $filename, 'public');
            $workspace->images()->create(['image' => $path]);
        }
    }

    return redirect('/dashboard/workspaces')->with('success', 'Workspace has been updated!');
}


    public function destroy(Workspace $workspace)
    {
        if ($workspace->images()->exists()) {
            foreach ($workspace->images as $image) {
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }
        }
        $workspace->delete();

        return redirect('/dashboard/workspaces')->with('success', 'Workspace has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Workspace::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }


    public function deleteImage($id)
{
    $image = \App\Models\WorkspaceImage::findOrFail($id);

    // Hapus file dari storage
    Storage::disk('public')->delete($image->image);

    // Hapus dari database
    $image->delete();

    return back()->with('success', 'Image deleted successfully');
}

public function storeImage(Request $request, $workspaceId)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $workspace = Workspace::findOrFail($workspaceId);

    $imagePath = $request->file('image')->store('workspace-images', 'public');

    $workspace->images()->create([
        'image' => $imagePath,
    ]);

    return back()->with('success', 'Image added successfully.');
}





}
