<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="CSS/style.css">
<x-head> </x-head>

<body>
   <x-navbar></x-navbar>



<!-- Hero Section start -->
<section class="hero" id="home">
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
 </section>

   <!-- Hero Section End -->


    <!-- About Section Start -->
    <section id="about" class="about">
        <h2>ABOUT US</h2>

        <div class="row">
            <div class="about-img">
                <img src="img/image about.jpg" alt="About Us">
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

    <div class="video-grid px-20">
    @foreach ($videos as $video)
        <div class="video-item">
            <a href="/videos/{{$video['slug']}}">
                <video src="{{ asset('storage/' . $video->video_path) }}" muted autoplay loop></video>
                <div class="video-title mx-10 font-bold">{{ $video-> title }}</div>
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

<div class="wrapper">
    @foreach($trainings as $training)
    <div class="card">
        <h1 class="font-bold">Rp. {{ number_format($training['harga'], 0, ',', '.') }}<span>/Person</span></h1>
        <p>{{ Str::limit($training ['title'], 100) }}</p>
        <ul>
        @foreach(json_decode($training->package, true) as $package)
            <li><i class="fa-solid fa-square-check"></i> {{ $package }}</li>
            @endforeach
        </ul>
        <a href="/trainings/{{$training['slug']}}">More Info</a>
    </div>
    @endforeach
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


<!-- Shilau Team Start -->
<!-- Shilau Team End -->

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
