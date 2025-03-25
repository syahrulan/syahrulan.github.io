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
  style="background-image: url('/img/2.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;"
  class="relative bg-cover bg-center bg-no-repeat"
>
  <!-- Overlay super gelap -->
  <div class="absolute inset-0 bg-black opacity-60"></div>

  <div
    class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8"
  >
    <div class="max-w-xl text-left ltr:sm:text-left rtl:sm:text-right">
      <h1 class="text-3xl font-extrabold text-white sm:text-5xl">
        PROJECT
        <strong class="block font-extrabold text-customBlue"> BASE LEARNING </strong>
      </h1>

      <p class="shadow-xl mt-4 text-left text-white sm:text-xl/relaxed">
      Project-Based Learning (PBL) is a learning method that encourages students to develop skills by solving real-world challenges through research, collaboration, and problem-solving.
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
        

<!-- <div class=" max-w-sm mx-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg h-13 max-h-13 " src="{{ asset( 'storage/' . $workspace->image) }}" alt="" />
    </a>
    <div class="p-5 ">
        <a href="/workspaces/{{$workspace['slug']}}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ Str::limit($workspace ['title'], 50) }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($workspace ['body'], 100) }}</p>
        <a href="/workspace/{{$workspace['slug']}}" class=" mt-auto inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
             <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div> -->
<div class="max-w-sm m-5  bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col h-full">
    <a href="#">
        <img class="rounded-t-lg h-40 w-full object-cover" src="{{ asset( 'storage/' . $workspace->image) }}" alt="" />
    </a>
    <div class="p-5 flex flex-col flex-grow">
        <a href="/workspaces/{{$workspace['slug']}}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ Str::limit($workspace['title'], 50) }}
            </h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 flex-grow">
            {{ Str::limit($workspace['body'], 100) }}
        </p>
        <a href="/workspace/{{$workspace['slug']}}" 
           class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-auto w-fit">
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
