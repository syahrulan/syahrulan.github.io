<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.trainings.index', [
            'trainings' => Training::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:trainings',
            'category' => 'required',
            'harga' => 'required|numeric',
            'image' => 'image|file|max:2048',
            'body' => 'required',
            'package' => 'nullable|array',
            'date' => 'required|date'
        ]);

        // Simpan gambar
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }
        // Konversi package ke JSON
        if (!$request->has('package')) {
            $validatedData['package'] = json_encode([]); // Default array kosong
        } else {
            $validatedData['package'] = json_encode($request->package);
        }
        


        Training::create($validatedData);

        return redirect('/dashboard/trainings')->with('success', 'New post has been added!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        // mengambil data package
        $packages = json_decode($training->package, true);
        return view('dashboard.trainings.show', [
            'training' => $training,
            'packages' => $packages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        return view('dashboard.trainings.edit', [
            'training'=>$training
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Training $training)
{
    $rules = [
        'title' => 'required|max:255',
        'category' => 'required',
        'harga' => 'required|numeric',
        'image' => 'image|file|max:2048',
        'body' => 'required',
        'package' => 'nullable|array',
        'date' => 'required|date'
    ];

    if ($request->slug != $training->slug) {
        $rules['slug'] = 'required|unique:trainings';
    }

    $validatedData = $request->validate($rules);

    // Simpan gambar jika ada
    if ($request->file('image')) {
        $validatedData['image'] = $request->file('image')->store('post-images', 'public');
    }

    // Konversi package ke JSON
    if (!$request->has('package')) {
        $validatedData['package'] = json_encode([]); // Default array kosong
    } else {
        $validatedData['package'] = json_encode($request->package);
    }

    // Update data
    Training::where('id', $training->id)->update($validatedData);

    return redirect('/dashboard/trainings')->with('success', 'Training has been updated!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        Training::destroy($training->id);

        return redirect('/dashboard/trainings')->with('success', 'Post has been Delete!');
    }

    public function checkSlug(Request $request)
    {
         $slug = SlugService::createSlug(Training::class, 'slug',  $request->title);
         return response()->json(['slug' => $slug]);
    }
}
