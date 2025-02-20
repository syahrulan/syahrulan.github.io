<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{ asset('css/training2.css') }}">
<x-head></x-head>
<body>
    <x-navbar></x-navbar>





<!-- Update News Start -->
<div class="update-news">
    
    

    <div class="container">
        <!-- Bagian Kiri -->
        <div class="left-content">
            <div class="news-item">
                <h1>{{ $training->title }} </h1>
                <p> {!! $training->body !!}</p>
              
            </div>
        </div>
        <!-- Bagian Kanan -->
        <div class="right-content">
        <div class="card-box">

<div class="card">
    <div class="text-box">
    <h2 class="m-80px font-bold">Rp.  {{ number_format($training['harga'], 0, ',', '.') }},-</h2>
    @foreach(json_decode($training->package, true) as $package)
                                <h3 class=""><i class="fa-solid fa-square-check"></i> {{ $package }}</h3> <!-- Ambil dari package training -->
                            @endforeach
    <a href="/training2" class=" font-bold">Daftar Sekarang</a>
</div>
</div>


</div>
        </div>
    </div>
 </div>
<!-- Update News End -->





<!-- testimoni video -->

 <!-- testimoni video end -->

<!-- button-up -->
 <x-buttonup></x-buttonup>

<x-footer></x-footer>
    <script src="JS/script.js"></script>
</body>
</html>




