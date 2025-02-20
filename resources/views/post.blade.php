<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{ asset('CSS/post.css') }}">
<x-head></x-head>
<body>
    <x-navbar></x-navbar>

<!-- Upper border Start -->
<div class="text-up">
</div>
<!-- Upper border End -->



<!-- Update News Start -->
 <div class="update-news">
    <!-- <div class="text-box-news">
        <h2>UPDATE NEWS</h2>
        <span class="divider"></span>
    </div> -->

    <!-- <div class="card-box">
       
        <a href="/post/{{$post['id'] }}"><div class="card">
        <img src="{{ asset($post['img']) }}" alt="">
            <div class="text-box">
            <h2>Friday, 28 September 2022</h2>
            <p>{{ $post ['body'] }}</p>
        </div>
        </div>
        </a>
    
    </div> -->

    <div class="container">
        <!-- Bagian Kiri -->
        <div class="left-content">
            <div class="news-item">
                <h2>{{ $post ['title'] }}</h2>
                <h3>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, j F Y') }}</h3>
                <img src="{{ asset( 'storage/' . $post->image) }}" alt="Foto Berita">
                <p> {!! $post->body !!}</p>
            </div>
        </div>
        <!-- Bagian Kanan -->
        <div class="right-content">
            <div class="recent-news">
                <h3>Berita Terkini</h3>
                <ul>
                @foreach (\App\Models\Post::getRecentNews() as $post)
                <li><a href="/{{$post['slug']}}">{{ $loop->iteration }}. {{ Str::limit($post->title, 100) }}</a>
                <p>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, j F Y') }}</p>
                </li>
            @endforeach
                </ul>
            </div>
        </div>
    </div>
 </div>
<!-- Update News End -->
<x-buttonup></x-buttonup>
<x-footer></x-footer>
<script src="{{ asset('JS/script.js') }}"></script>

</body>
</html>
