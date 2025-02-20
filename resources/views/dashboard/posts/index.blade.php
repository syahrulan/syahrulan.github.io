@extends('dashboard.layouts.main')

@section('container')
<div class=" text-black d-flex justify-content-between flex-warp flex-md-nowarp align-items-center pt-3 pb-2 mb-3 border-bottom ">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
        </div>
    </div>
    @if(session()->has('success'))
        <div class=" text-align-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        {{ session('success')}}
        </div>
        @endif
    <a href="/dashboard/posts/create"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i class="fa-solid fa-plus"></i> Create New Post</button></a>
      
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-black uppercase bg-customBlue  ">
            <tr>
                <th scope="col" class="p-4">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Paragraph
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    {{ $loop->iteration }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900  dark:text-white">
                {{  Str::limit($post ['title']) }}
                </th>
                <td class="p-4">
                    <img src="{{ asset( 'storage/' . $post->image) }}" class="w-16 md:w-32 max-w-full max-h-full" alt="Berita Terkini">
                </td>
                <td class="px-6 py-4">
                none
                </td>
                <td class="px-6 py-4">
                {!! Str::limit(strip_tags($post->body), 50, '...') !!}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="/dashboard/posts/{{ $post->slug }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-eye"></i></a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="inline">
                    @method('delete')
                    @csrf
                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="return confirm('are you sure?')"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>


@endsection