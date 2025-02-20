<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="CSS/style.css">
<x-head></x-head>
<body>
   


@include('dashboard.layouts.header')


@include('dashboard.layouts.sidebar')




<div class="p-4 sm:ml-64  mt-20">
<div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

   @yield('container')
   
   </div>
</div>





<!-- Tombol Scroll ke Atas -->
<x-buttonup></x-buttonup>


 <script src="JS/script.js"></script>
</body>

</html>







