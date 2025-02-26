@extends('dashboard.layouts.main')

@section('container')
<div class="container">
        <div class="left-content">
            <div class="news-item">
                <h2 class="text-2xl font-bold mb-10">{{ $training ['title'] }}</h2>
                <h3 class="mb-8">{{ \Carbon\Carbon::parse($training->created_at)->translatedFormat('l, j F Y') }}</h3>
                <div class="button mb-8">
                <a href="/dashboard/trainings"><button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 "><i class="fa-solid fa-arrow-left"></i>  Back to all my posts</button></a>
                <a href="/dashboard/trainings/{{ $training->slug }}/edit"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 "><i class="fa-solid fa-pen-to-square"></i>  Edit</button></a>
                <form action="/dashboard/trainings/{{ $training->slug }}" method="post" class="inline">
                    @method('delete')
                    @csrf
                    <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 " onclick="return confirm('are you sure?')"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </div>

                <img class="mb-7 max-w-[50rem] h-auto" src="{{ asset( 'storage/' . $training->image) }}" alt="Foto Berita">
                <p>{!! $training->body !!}</p>

                <h1 class="text-2xl mt-10 font-bold ">Harga Training : Rp.  {{ number_format($training['harga'], 0, ',', '.') }},-</h1>
                <h1 class="mt-10">Benefit :</h1>
                @foreach(json_decode($training->package, true) as $package)
                <h3 class=""><i class="fa-solid fa-square-check"></i> {{ $package }}</h3> <!-- Ambil dari package training -->
                @endforeach
            </div>
        </div>
    </div>
 </div>


@endsection