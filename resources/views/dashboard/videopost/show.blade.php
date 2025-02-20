@extends('dashboard.layouts.main')

@section('container')
<div class="container">
        <div class="left-content">
            <div class="news-item">
                <h2 class="text-2xl font-bold mb-10">{{ $video ['title'] }}</h2>
                <h3 class="mb-8">{{ \Carbon\Carbon::parse($video->created_at)->translatedFormat('l, j F Y') }}</h3>
                <div class="button mb-8">
                <a href="/dashboard/videopost"><button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 "><i class="fa-solid fa-arrow-left"></i>  Back to all my posts</button></a>
                <a href="/dashboard/videopost/{{ $video->slug }}/edit"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 "><i class="fa-solid fa-pen-to-square"></i>  Edit</button></a>
                <form action="/dashboard/videopost/{{ $video->slug }}" method="post" class="inline">
                    @method('delete')
                    @csrf
                    <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 " onclick="return confirm('are you sure?')"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </div>

                <img class="mb-7 max-w-[50rem] h-auto" src="{{ asset( 'storage/' . $video->video_path) }}" alt="Video Project">
                <p>{{ $video['body'] }}</p>
            </div>
        </div>
    </div>
 </div>


@endsection