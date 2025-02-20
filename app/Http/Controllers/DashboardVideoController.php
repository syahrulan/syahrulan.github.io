<?php

namespace App\Http\Controllers;



use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

$slug = SlugService::createSlug(Video::class, 'slug', 'My First Post');

class DashboardVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.videopost.index', [
            'videos' => Video::all()
        ]);
        
  
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.videopost.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:videos',
            'body' => 'required',
            'video_path' => 'required|mimetypes:video/mp4,video/mpeg,video/avi'
        ]);

          // Simpan video
          if ($request->file('video_path')) {
            $validatedData['video_path'] = $request->file('video_path')->store('video-posts', 'public');
        }
        
       

        

        Video::create($validatedData);

        return redirect('/dashboard/videopost')->with('success', 'New post has been added!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video, )
    {
      
        dd($video);
        // return view('dashboard.videopost.show', [
        //     'video_path' => $video
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('dashboard.videopost.edit', [
            'video' => $video,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $rules = [
            'title' => 'required|max:255',
            'video_path' => 'required|mimetypes:video/mp4,video/mpeg,video/avi',
            'body' => 'required',
        ];

        if($request->slug != $video->slug){
            $rules['slug'] = 'required|unique:videos';
        }

        $validatedData = $request->validate($rules);
        if ($request->file('video_path')) {
            if ($request->oldVideo) {
                Storage::delete($request->oldVideo);
            }
            $validatedData['video_path'] = $request->file('video_path')->store('post-images', 'public');
        }

        
        Video::where('id', $video->id)
        ->update($validatedData);
        return redirect('/dashboard/videopost')->with('success', 'post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
       // Hapus file video dari storage jika diperlukan
       Storage::delete('public/' . $video->video_path);

       // Hapus record video dari database
       $video->delete();
   
       return redirect('/dashboard/videopost')->with('success', 'Video has been deleted!');
         
    }

    public function checkSlug(Request $request)
    {
         $slug = SlugService::createSlug(Video::class, 'slug',  $request->title);
         return response()->json(['slug' => $slug]);
    }
}
