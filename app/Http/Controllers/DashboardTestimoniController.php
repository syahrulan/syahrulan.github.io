<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardTestimoniController extends Controller
{
    public function index()
    {
        return view('dashboard.testimoni.index', [
            'testimonis' => Testimoni::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.testimoni.create');
    }

    public function store(Request $request)
    {
           // Pastikan video_url tidak kosong sebelum validasi
           if (!$request->has('video_url') || empty($request->video_url)) {
            return redirect()->back()->withErrors(['video_url' => 'URL video tidak boleh kosong']);
        }
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:testimonis',
            'body' => 'required',
           'video_url' => ['required', 'url', 'regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+/i']

            // required|mimetypes:video/mp4,video/mpeg,video/avi'
        ]);

        // Simpan video
        // if ($request->file('video_url')) {
        //     $validatedData['video_url'] = $request->file('video_url')->store('post-images', 'public');
        // }
        Testimoni::create($validatedData);
        return redirect('/dashboard/videopost')->with('success', 'New post has been added!');
        
    }

    public function show(Testimoni $testimoni)
    {
        return view('dashboard.testimoni.show', [
            'testimoni' => $testimoni
        ]);
    }

    public function edit(Testimoni $testimoni)
    {
        return view('dashboard.testimoni.edit', ['testimoni' => $testimoni]);
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $rules = [
            'title' => 'required|max:255',
            'body' => 'required',
           'video_url' => ['required', 'url', 'regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+/i']
        ];

        if($request->slug != $testimoni->slug){
            $rules['slug'] = 'required|unique:testimonis';
        }

        $validatedData = $request->validate($rules);
        $testimoni->update($validatedData);
        // if ($request->file('video_url')) {
        //     if ($request->oldVideo) {
        //         Storage::delete($request->oldVideo);
        //     }
        //     $validatedData['video_url'] = $request->file('video_url')->store('post-images', 'public');
        // }

        
        // Testimoni::where('id', $testimoni->id)
        // ->update($validatedData);
        return redirect('/dashboard/testimoni')->with('success', 'post has been updated!');
    }

    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();
        return redirect('/dashboard/testimoni')->with('success', 'Testimoni telah dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Testimoni::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
