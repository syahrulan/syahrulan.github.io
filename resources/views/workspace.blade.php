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
       <div class="absolute top-[-20px] left-[325px] w-[260px] h-[15px] bg-customBlue"></div>
        <div class="absolute top-[-6px] left-[570px] w-[15px] h-[230px] bg-customBlue"></div>

    <img class="h-90 w-85 sm:w-[28rem] sm:h-[28rem] flex-shrink-0 object-cover" 
         src="{{ asset( 'storage/' . $workspace->image) }}" 
         alt="">

    <!-- Kotak dengan nama -->
    <div class="absolute  top-1/2 right-20 bg-customBlue  text-white px-8 py-8 rounded-lg">
        <p class="text-lg font-semibold">{{ Str::limit($workspace ['title'], 100) }}</p>
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
    <div class="flex flex-wrap text-center">
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <h2 class="title-font font-bold text-6xl text-customBlue">200</h2>
          <p class="leading-relaxed text-2xl">Total Room</p>
        </div>
      </div>
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <h2 class="title-font font-bold text-6xl text-customBlue">100</h2>
          <p class="leading-relaxed text-2xl">Workspace Room</p>
        </div>
      </div>
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <h2 class="title-font font-bold text-6xl text-customBlue">100</h2>
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
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">From The Blog</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600 dark:text-gray-300">
                Dive into the latest in technology with our insightful blog posts.
            </p>
        </div>
        <div
            class="mx-auto mb-20 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-12 lg:mx-0 lg:max-w-none lg:grid-cols-3 ">
            <!-- First blog post -->

            <article
                class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 dark:bg-gray-700 px-8 py-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                <img src="https://images.unsplash.com/photo-1666112835156-c65bb806ac73?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxNXx8cXVhbnR1bSUyMGNvbXB1dGluZ3xlbnwwfDB8fHwxNzEyNzUzMTk2fDA&ixlib=rb-4.0.3&q=80&w=1080" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
            </article>
            
 
            <!-- More blog posts can be added similarly -->
        </div>
    </div>

</div>
<!-- button-up -->
 <x-buttonup></x-buttonup>

<x-footer></x-footer>
    <script src="JS/script.js"></script>
    
</body>
</html>




