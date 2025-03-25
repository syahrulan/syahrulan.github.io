<!DOCTYPE html>
<html lang="en">
<x-head></x-head>
<body>
    <x-navbar></x-navbar>

<!-- Upper border Start -->
<section class="bg-white dark:bg-gray-900 mt-40 mx-auto">
    <div class="container flex flex-col xl:flex-row items-center px-4 md:px-20 mx-auto">
        <!-- Image Section -->
        <div class="relative justify-center w-full xl:w-1/2 mb-8 xl:mb-0">
            <img class="shadow-xl flex-shrink-0 object-cover h-[16rem] md:h-[24rem] w-full md:w-full mx-auto" 
                 src="{{ asset('storage/' . $workspace->image) }}" 
                 alt="Workspace Image">
        </div>

        <!-- Text Section -->
        <div class="flex flex-col items-center xl:items-start w-full xl:w-1/2 px-4">
            <h2 class="text-3xl md:text-6xl font-bold tracking-tight text-gray-800 dark:text-white text-center xl:text-left">
                Welcome To Our Workspace
            </h2>
            <p class="block mt-4 text-gray-500 dark:text-gray-300 text-center xl:text-left">
                {{ $workspace['body'] }}
            </p>
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


<!-- END  -->

<div class="w-full bg-white pb-1">
    <div class="mx-auto max-w-7xl pt-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">Rooms in the {{ Str::limit($workspace['title'], 100) }}</h2>
        </div>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-6 mx-auto flex flex-wrap">
                <div class="flex w-full mb-4 flex-wrap">
                </div>
                <div class="flex flex-wrap md:-m-2 -m-1">
                    @foreach($workspace->images as $index => $image)
                        @if($index % 2 == 0)
                            <div class="flex flex-wrap w-1/2">
                        @endif
                        <div class="md:p-2 p-1 {{ $index % 4 == 2 || $index % 4 == 3 ? 'w-full' : 'w-1/2' }} h-64 md:h-80"> <!-- Tambah tinggi eksplisit -->
                            <img alt="gallery" class="w-full h-full object-cover object-center block border-none outline-none" src="{{ asset('storage/' . $image->image) }}">
                        </div>
                        @if($index % 2 == 1 || $loop->last)
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
<!-- button-up -->
 <x-buttonup></x-buttonup>

<x-footer></x-footer>
    <script src="{{ asset('js/script.js') }}" defer></script>
    
</body>
</html>




