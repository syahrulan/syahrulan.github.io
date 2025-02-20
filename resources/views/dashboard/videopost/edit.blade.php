@extends('dashboard.layouts.main')

@section('container')
<form method="post" action="/dashboard/videopost/{{ $video->slug }}" class="max-w-full" enctype="multipart/form-data">
    @method('put')    
    @csrf
    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
        <input type="text" id="title" name="title" 
               class=" @error('title') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
               autofocus 
               value="{{ old('title', $video->title) }}" />
        @error('title')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
        <input type="text" id="slug" name="slug" 
               class="@error('slug') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" 
               value="{{ old('slug', $video->slug) }}" />
        @error('slug')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Video</label>
        <input type="hidden" name="oldVideo" value="{{ $video->video_path }}">
        @if($video->video_path)
        <video controls class="mb-3 w-full max-h-80 block">
            <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        @endif

        <input class="@error('video') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:border-none" 
               id="video" 
               type="file" 
               name="video_path" 
               accept="video/*"
               onchange="previewVideo()">
        @error('video')
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Update Post
    </button>
</form>

<script>
    document.querySelector('#title').addEventListener('change', function() {
        fetch('/dashboard/videopost/checkSlug?title=' + this.value)
            .then(response => response.json())
            .then(data => document.querySelector('#slug').value = data.slug);
    });

    function previewVideo() {
        const video = document.querySelector('#video');
        const videoPreview = document.querySelector('.video-preview');

        videoPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(video.files[0]);

        oFReader.onload = function(oFREvent) {
            videoPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
