<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="CSS/news.css">
<x-head></x-head>
<body>
    <x-navbar></x-navbar>

<!-- Upper border Start -->
<div class="text-up">
    <h1>NEWS</h1>
</div>
<!-- Upper border End -->



<!-- Update News Start -->
 <div  class="update-news">
    <div class="text-box-news text-body-secondary font-bold">
        <h2>Update News</h2>
        <span class="divider"></span>
    </div>
    <div id=" update-news" class="card-content">
   <!-- Search section -->
   @if (!$posts->isEmpty())
            <x-search></x-search>
        @endif
    <!-- Search end section -->
    <div id="posts-container">
    <div class="card-box">

    @if ($posts->isEmpty())
            <p class="text-center mt-10 text-black py-28">There is no current news at the moment.</p>
        @endif
        @foreach ($posts as $post)
        <a href="/posts/{{$post['slug']}}"><div class="card">
            <img src="{{ asset( 'storage/' . $post->image) }}" alt="">
            <div class="text-box">
            <h2>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, j F Y') }}</h2>
            <p>{{ Str::limit($post ['title'], 100) }}</p>
        </div>
        </div>
        </a>
        @endforeach
    </div>

    @if (!$posts->isEmpty())
    <div id="pagination" class="pagination  py-8 ">
    {{ $posts->withQueryString()->fragment('update-news')->links() }}
    </div>
    @endif
    </div>
    
</div>
 </div>
<!-- Update News End -->

<!-- button-up -->
 <x-buttonup></x-buttonup>

<x-footer></x-footer>
    <script src="JS/script.js"></script>
</body>
</html>




