<!DOCTYPE html>
<html lang="en">
<x-head></x-head>
<body>
    <x-navbar></x-navbar>

<!-- Upper border Start -->
<section class="bg-white dark:bg-gray-900 mt-40">
    <div class="container flex flex-col items-center px-20  mx-auto xl:flex-row">
    <div class="relative flex justify-center xl:w-1/2">
       <!-- Garis Desain -->
       <div class="absolute  bg-customBlue 
                          lg:top-[-20px] lg:left-[20.3rem] lg:w-[260px] lg:h-[15px]                   
                          sm:top-[-10px] sm:left-[90px] sm:w-[200px] sm:h-[10px]  
                          md:top-[-10px] md:left-[140px] md:w-[200px] md:h-[10px]  "></div>
                          
        <div class="absolute  bg-customBlue 
                            lg:top-[-6px] lg:left-[35.6rem] lg:w-[15px] lg:h-[230px]
                            sm:top-[0px] sm:left-[280px] sm:w-[10px] sm:h-[150px] 
                            md:top-[-10px] md:left-[337px] md:w-[10px] md:h-[150px] "></div>

    <img class="flex-shrink-0 object-cover
                         lg:h-[25rem] lg:w-[28rem] sm:w-[28rem] sm:h-[28rem] md:w-[48rem] md:h-[28rem] " 
              src   ="{{ asset('storage/' . $workspace->image) }}" alt="">

    <!-- Kotak dengan nama -->
<div class="absolute bg-customBlue text-white px-8 py-8 rounded-lg 
            max-w-sm md:max-w-md lg:max-w-lg
            lg:top-1/2 lg:right-20 
            md:top-[140px] md:right-[-15px] 
            sm:top-[150px] sm:right-[-15px]">
    <p class="text-lg font-semibold">{{ Str::limit($workspace['title'], 100) }}</p>
</div>
</div>

        <div class="flex flex-col items-center  xl:items-start xl:w-1/2 ">
            <h2 class="text-6xl font-bold tracking-tight text-gray-800  dark:text-white">
                Welcome To Our Workspace
            </h2>

            <p class="block m-w-1 mt-4 text-gray-500 dark:text-gray-300">{{ ($workspace ['body']) }} </p>

            <div class="mt-6 sm:-mx-2">
              

           
            </div>
        </div>
    </div>
</section>
<!-- Upper border End -->



<!-- Update News Start -->
<section class="text-gray-600 body-font py-20">
  <div class="container px-20 mx-auto">
    <div class="flex flex-nowrap text-center">
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <h2 class="title-font font-bold text-6xl text-customBlue">{{ ($workspace ['total_rooms']) }}</h2>
          <p class="leading-relaxed text-2xl">Total Room</p>
        </div>
      </div>
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <h2 class="title-font font-bold text-6xl text-customBlue">{{ ($workspace ['workshop_rooms']) }}</h2>
          <p class="leading-relaxed text-2xl">Workspace Room</p>
        </div>
      </div>
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <h2 class="title-font font-bold text-6xl text-customBlue">{{ ($workspace ['classrooms']) }}</h2>
          <p class="leading-relaxed text-2xl">Classroom</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Update News End -->


<!-- test -->

 <!-- test -->

 <div class="w-full bg-white pb-10">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 pt-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">Rooms in the {{ Str::limit($workspace ['title'], 100) }} </h2>
          
        </div>
        <div
            class="mx-auto mb-20 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-12 lg:mx-0 lg:max-w-none lg:grid-cols-3 ">
            <!-- First blog post -->
            @foreach($workspace->images as $image)
            <article
            class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 dark:bg-gray-700 px-8 py-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
            <img src="{{ asset('storage/' . $image->image) }}" alt="Workspace Image"
            class="absolute inset-0 -z-10 h-full w-full object-cover">
            </article>
            @endforeach
        </div>
    </div>

</div>
<!-- button-up -->
 <x-buttonup></x-buttonup>

<x-footer></x-footer>
    <script src="{{ asset('js/script.js') }}" defer></script>
    
</body>
</html>




