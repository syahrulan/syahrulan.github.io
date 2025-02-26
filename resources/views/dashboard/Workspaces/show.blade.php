@extends('dashboard.layouts.main')

@section('container')
<div class="container">
        <div class="left-content">
            <div class="news-item">
                <h2 class="text-2xl font-bold mb-10">{{ $workspace ['title'] }}</h2>
                <h3 class="mb-8">{{ \Carbon\Carbon::parse($workspace->created_at)->translatedFormat('l, j F Y') }}</h3>
                <div class="button mb-8">
                <a href="/dashboard/workspaces"><button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 "><i class="fa-solid fa-arrow-left"></i>  Back to all my posts</button></a>
                <a href="/dashboard/workspaces/{{ $workspace->slug }}/edit"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 "><i class="fa-solid fa-pen-to-square"></i>  Edit</button></a>
                <form action="/dashboard/workspaces/{{ $workspace->slug }}" method="post" class="inline">
                    @method('delete')
                    @csrf
                    <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 " onclick="return confirm('are you sure?')"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </div>

                <img class="mb-7 max-w-[50rem] h-auto" src="{{ asset( 'storage/' . $workspace->image) }}" alt="Foto Berita">
                <p>{!! $workspace->body !!}</p>
            </div>


            <div class="w-full bg-white pb-10">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 pt-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                Rooms in the {{ Str::limit($workspace['title'], 100) }}
            </h2>
        </div>
        <div class="mx-auto mb-20 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-12 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        @foreach($workspace->images as $image)
<article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 dark:bg-gray-700 px-8 py-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
    <img src="{{ asset('storage/' . $image->image) }}" alt="Workspace Image" class="absolute inset-0 -z-10 h-full w-full object-cover">

    <!-- Tombol Hapus -->
    <form action="{{ route('workspace.image.destroy', $image->id) }}" method="POST" class="absolute top-4 right-4">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this image?')" class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm">
            Delete
        </button>
    </form>
</article>
@endforeach
<!-- Form Tambah Foto Langsung di Galeri -->
<article class="relative isolate flex flex-col justify-center items-center overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-800 px-8 py-8 pb-8 pt-80 sm:pt-48 lg:pt-80 border-dashed border-2 border-gray-400 dark:border-gray-600">
                            <form action="{{ route('workspace.image.store', $workspace->id) }}" method="POST" enctype="multipart/form-data" class="text-center">
                                @csrf
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Add New Photo</label>
                                <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mb-4" required>
                                <button type="submit" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">Upload</button>
                            </form>
                        </article>
        </div>
    </div>
</div>

        </div>
    </div>
 </div>

@endsection