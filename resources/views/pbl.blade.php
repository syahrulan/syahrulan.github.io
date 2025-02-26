<!DOCTYPE html>
<html lang="en">

<x-head> </x-head>

<body>
   <x-navbar></x-navbar>

   <!-- hero start -->
    <!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
-->

<section
 style="background-image: url('/img/background1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;"
  class="relative  bg-cover bg-center bg-no-repeat"
>
  <div
    class="absolute inset-0 bg-gray-900/75 sm:bg-transparent sm:from-gray-900/95 sm:to-gray-900/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l"
  ></div>

  <div
    class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8"
  >
    <div class="max-w-xl text-left ltr:sm:text-left rtl:sm:text-right">
      <h1 class="text-3xl font-extrabold text-white sm:text-5xl">
        Let us find your

        <strong class="block font-extrabold text-rose-500"> Forever Home. </strong>
      </h1>

      <p class="mt-4 text-left text-white sm:text-xl/relaxed">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus
        numquam ea!
      </p>

      <div class="mt-8 flex flex-wrap gap-4 text-center">
        <a
          href="/whatpbl"
          class="block w-full max-w-xl rounded-sm bg-customBlue px-10 py-3 text-sm font-bold text-white shadow-sm hover:bg-indigo-700 focus:ring-3 focus:outline-hidden sm:w-auto"
        >
          WHAT IS PBL?
        </a>

      </div>
    </div>
  </div>
</section>
<!-- hero end -->

<!-- workspace start -->
 <style>
    .update-news{
    background-color: #ddd;
    padding: 20px;
}
.update-news .text-box-news{
    align-content: center;
    margin-top: 30px;
    text-align: center;
}
.update-news .text-box-news h2{
    font-size: 1.7rem;
    color: #000000;
   
}
.update-news .text-box-news span{
    width: 210px;
    height: 4px;
    background-color: #2699CB;
    display: inline-block;
    margin-bottom: 20px;
    margin-top: 5px;
    margin-left: 5px;
}
.update-news .card-content{
margin: 0;
}
.update-news .card-box  {
    display: flex;
    flex-wrap: wrap;
    text-decoration: none;
    justify-content: center;
    margin: 0;
}
 </style>
 <div  class="update-news">
    <div class="text-box-news text-body-secondary font-bold">
        <h2>WORKSPACE</h2>
        <span class="divider"></span>
    </div>
    <div id=" update-news" class="card-content">
   <!-- Search section -->
    <!-- Search end section -->
    <div id="posts-container">
    <div class="card-box">

    @if ($workspaces->isEmpty())
            <p class="text-center mt-10 text-black py-28">There is no current news at the moment.</p>
        @endif
        @foreach ($workspaces as $workspace)
        

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="{{ asset( 'storage/' . $workspace->image) }}" alt="" />
    </a>
    <div class="p-5">
        <a href="/workspaces/{{$workspace['slug']}}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ Str::limit($workspace ['title'], 100) }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($workspace ['body'], 1000) }}</p>
        <a href="/workspace/{{$workspace['slug']}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>
        @endforeach
    </div>

    @if (!$workspaces->isEmpty())
    <div id="pagination" class="pagination  py-8 ">
    {{ $workspaces->withQueryString()->fragment('update-news')->links() }}
    </div>
    @endif
    </div>
    
</div>
 </div>
 <!-- workspace end -->
<!-- Footer start -->
<x-footer></x-footer>
<script src="{{ asset('js/script.js') }}" defer></script>
</body>

</html>
