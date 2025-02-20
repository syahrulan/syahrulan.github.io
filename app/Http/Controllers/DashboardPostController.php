<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

$slug = SlugService::createSlug(Post::class, 'slug', 'My First Post');

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);
        // Simpan gambar
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post,)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'required|image|file|max:2048',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }

        Post::where('id', $post->id)
            ->update($validatedData);
        return redirect('/dashboard/posts')->with('success', 'post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been Delete!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug',  $request->title);
        return response()->json(['slug' => $slug]);
    }
}
