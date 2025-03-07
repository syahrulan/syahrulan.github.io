<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="CSS/news.css">
<x-head></x-head>
<body>
    <x-navbar></x-navbar>

<!-- Upper border Start -->
<div class="text-up">
    <h1>INFORMATICTS ENGINEERING</h1>
</div>
<!-- Upper border End -->



<!-- Update News Start -->
 <div  class="update-news">
    <div class="text-box-news text-body-secondary font-bold">
        <h2>INFORMATICS ENGINEERING PROJECT</h2>
        <span class="divider"></span>
    </div>
    <div id=" update-news" class="card-content">
   <!-- Search section -->
   @if (!$projects->isEmpty())
            <x-search></x-search>
        @endif
    <!-- Search end section -->
    <div id="posts-container">
    <div class="card-box">
        @if ($projects->isEmpty())
            <p class="text-center mt-10 text-black py-28">There are no projects available for the Informatics Engineering category at the moment.</p>
        @endif

        @foreach ($projects as $project)
            <a href="/projects/{{ $project->slug }}">
                <div class="card">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="">
                    <div class="text-box">
                        <h2>{{ \Carbon\Carbon::parse($project->created_at)->translatedFormat('l, j F Y') }}</h2>
                        <p>{{ Str::limit($project->title, 100) }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    @if (!$projects->isEmpty())
    <div id="pagination" class="pagination  py-8 ">
    {{ $projects->withQueryString()->fragment('update-news')->links() }}
    </div>
    @endif
    </div>
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




