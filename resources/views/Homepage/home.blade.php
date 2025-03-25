<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="CSS/style.css">
<x-head> </x-head>

<body>
   <x-navbar></x-navbar>



<!-- Hero Section start -->
<!-- <section class="hero" id="home">
    <div class="hero-video">
        <video autoplay muted loop>
            <source src="videohome/video2.mp4" type="video/mp4">
        </video>
    </div>
    <main class="content">
        <h1>Downstream Innovation and Business  
            Services Office </h1>
        <p>Downstream Innovation and Business Services Office (SHILAU) has a role in conducting a feasibility or empathy study and develop an empathy map/data clustering of potential technology, 
            process or systems in the "community" that will be brought to learning on campus. SHILAU in collaboration with Center for Research and Community Services  (P3M) also facilitate industry and society-focused applied research. Apart from that, 
            SHILAU responsible for developing business strategies, marketing and downstreaming the applied research that have been developed on campus as well as facilitating entrepreneurship and start-up companies from students and alumni.</p>
        <a href="#" class="cta">Get Started</a>
    </main>
 </section> -->

 <header class="mt-20">
    <div class="w-full bg-center bg-cover h-[40rem]" style="background-image: url('/img/1.jpg');">
        <!-- Meningkatkan opasitas overlay dari 40% menjadi 70% -->
        <div class="flex items-center justify-center w-full h-full bg-gray-900/70">
            <div class="text-center">
                <h1 class="text-3xl font-semibold text-white lg:text-4xl">Downstream Innovation and <span class="text-blue-400">Business  
                Services</span> Office</h1>
                <button class="w-full px-10 py-5 mt-12 text-sm font-medium text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md lg:w-auto hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Get Started</button>
            </div>
        </div>
    </div>
</header>

   <!-- Hero Section End -->


    <!-- About Section Start -->
    <section id="about" class="about">
        <h2>ABOUT US</h2>

        <div class="row">
            <div class="about-img ">
                <img src="img/4.jpg" alt="About Us">
            </div>
            <div class="content">
                <p>
                It is a downstream business unit for the innovation of processes and products resulting from learning and research activities, as well as production services and supporting services in line with the competencies of Polibatam.
                </p>
            </div>
        </div>
    </section>
    <!-- About Section End -->
     

    
<!-- Complete Project Start -->
<div class="video-box">
    <div class="text-box-video">
        <h2>COMPLETE PROJECT <br>  </h2>
        <span class="divider"></span>
        <p>Projects that have been completed by students and lecturers through Project Based Learning. These projects come from industry as well as technology
            development</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 p-4 sm:p-5 md:px-20">
    @foreach ($videos as $video)
        <div class="relative overflow-hidden rounded-lg shadow-md w-full max-w-[25rem] mx-auto">
            <a href="/videos/{{$video['slug']}}" class="group">
                <video 
                    src="{{ asset('storage/' . $video->video_path) }}" 
                    muted 
                    autoplay 
                    loop 
                    class="w-full h-auto block transition-all duration-300 group-hover:brightness-50"
                ></video>
                <div class="absolute top-[20%] left-4 right-4 font-bold text-white text-base sm:text-lg md:text-xl rounded text-left opacity-0 transition-opacity duration-300 ease-in-out group-hover:opacity-100">
                    {{ $video->title }}
                </div>
            </a>
        </div>
    @endforeach
</div>



</div>
<!-- Complete Project End -->


<!-- Training Package Start -->
 <div class="price">
<div class="text-box">
    <h2>TRAINING PACKAGE </h2>
    <span class="divider"></span>
    <p>Training packages are a collection of units of competency, skill sets and qualifications that outline the required knowledge and performance criteria for job roles and tasks within industry, and how these can be assessed to determine if a worker is competent.</p>
</div>
</div>

<div class="bg-abu">
    <div class="container px-6 py-8 mx-auto">
        <div class="flex flex-col items-center justify-center space-y-8 lg:-mx-4 lg:flex-row lg:items-stretch lg:space-y-0">
            @foreach($trainings as $training)
            <div class="flex flex-col w-full max-w-sm p-8 space-y-8 text-center bg-white border-2 border-gray-200 rounded-lg lg:mx-4 dark:bg-gray-900 dark:border-gray-700">
                <!-- Training Title (Fixed Height) -->
                <div class="flex-shrink-0 h-12 flex items-center justify-center">
                    <h2 class="inline-flex items-center justify-center px-2 font-semibold tracking-tight text-black uppercase rounded-lg bg-gray-50 dark:bg-gray-700">
                        {{ Str::limit($training['title'], 100) }}
                    </h2>
                </div>

                <!-- Price -->
                <div class="flex-shrink-0">
                    <span class="pt-2 text-4xl font-bold text-hijau2 uppercase ">
                        Rp. {{ number_format($training['harga'], 0, ',', '.') }}
                    </span>
                    <span class="text-gray-500 dark:text-gray-400">
                        /Person
                    </span>
                </div>

                <!-- Package List (Left-Aligned) -->
                <ul class="flex-1 space-y-4 text-left">
                    @foreach(json_decode($training->package, true) as $package)
                    <li class="text-gray-500 dark:text-gray-400 flex items-center">
                        <i class="fa-solid fa-square-check mr-2"></i>{{ $package }}
                    </li>
                    @endforeach
                </ul>

                <!-- More Info Button -->
                <a href="/trainings/{{$training['slug']}}" 
                   class="inline-flex items-center justify-center px-4 py-2 font-medium text-white uppercase transition-colors bg-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none">
                    More Info
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>



<!-- Training Package End -->

<!-- call start -->
<div class="call">
    <div class="text-line">
        <h1>We are open and ready to serve you!</h1>
    </div>
    <div class="button ">
        <a href="/contactus"><button class=" bg-white text-black "><i class="fa-solid fa-phone"></i> Call Us</button></a>
    </div>
</div>
<!-- call end -->

<!-- shilau team -->
<div class="bg-white py-20 sm:py-30">
  <div class="mx-auto grid max-w-7xl gap-20 px-6 lg:px-8 xl:grid-cols-3">
    <div class="max-w-xl">
      <h2 class="text-3xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-4xl">Shilau Team</h2>
      <p class="mt-6 text-lg/8 text-gray-600">With a spirit of collaboration, creativity, and expertise, the SHILAU team stands as a strong foundation in driving our mission to provide efficient and effective information services.</p>
    </div>
    <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
    @foreach($teams as $team)
      <li>
        <div class="flex items-center gap-x-6">
          <img class="size-20 rounded-full" src="{{ asset('storage/' . $team->image) }}" alt="">
          <div>
            <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">{{ $team->title }}</h3>
            <p class="text-sm/6 font-semibold text-customBlue">{{ $team->jabatan }}</p>
          </div>
        </div>
      </li>
      @endforeach
      <!-- More people... -->
    </ul>
  </div>
</div>

 <!-- shilau team end -->

<!-- partner Start -->
 <div class="container-partner">
<div class="partner">
    <img src="img/Asset 1 1.png" alt="">
    <img src="img/Asset 1 1.png" alt="">
    <img src="img/Asset 1 1.png" alt="">
    <img src="img/Asset 1 1.png" alt="">
    <img src="img/Asset 1 1.png" alt="">
    <img src="img/Asset 1 1.png" alt="">
    <img src="img/Asset 1 1.png" alt="">
    <img src="img/Asset 1 1.png" alt="">
    <img src="img/Asset 1 1.png" alt="">
</div>
</div>
<!-- Partner End -->


<!-- chatbot -->

<!-- Tombol Scroll ke Atas -->

<!-- Footer start -->
<x-footer></x-footer>
 <script src="JS/script.js"></script>
</body>

</html>
