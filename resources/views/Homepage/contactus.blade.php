<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="CSS/contacus.css">
<x-head></x-head>

<body>

   <x-navbar></x-navbar>

<!-- Upper border Start -->
<div class="text-up">
    <h1>CONTACT US</h1>
</div>
<!-- Upper border End -->

<!-- Contact Us Session Start-->
<div class="contact-us">
    <!-- Notifikasi jika pesan sukses terkirim -->
    @if(session('success'))
                <div class="bg-green-100 text-green-700 border border-green-400 px-4 py-2 rounded mb-4">
                {{ session('success') }}
                </div>
                @endif
    <div class="container-contact">
        <div class="contact-wrapper">
            <div class="contact-form">
                <h3>Send us a message</h3>
                <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                    <div class="form-grup">
                        <input type="text" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-grup">
                        <input type="email" name="email" placeholder="Your Email">
                    </div>
                    <div class="form-grup">
                        <textarea name="message" placeholder="Your Message" ></textarea>
                    </div>
                    <button type="submit">Send Message</button>
                </form>
            </div>
            <div class="contact-info">
                <h3>Contact Information</h3>
                <p><i class="fa-solid fa-phone"></i>+62 831-8693-8215</p>
                <p><i class="fa-solid fa-envelope"></i> shilau@polibatam.ac.id</p>
                <p><i class="fa-solid fa-map-marker-alt"></i>Jl. Ahmad Yani , Kec. Batam Kota , Kab/Kota. Batam , Prov. Kepulauan Riau 29461</p>
            </div>
        </div>
    </div>
</div>
<!-- Contact Us Session Start-->


<!-- Google Map Start-->
<div class="container-teks">
    <h1>LOCATION</h1>
    <span class="divider"></span>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.057798979733!2d104.04588167494254!3d1.1187258622752214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98921856ddfab%3A0xf9d9fc65ca00c9d!2sPoliteknik%20Negeri%20Batam!5e0!3m2!1sid!2sid!4v1727142227034!5m2!1sid!2sid" 
    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- Google Map End -->

<!-- button-up -->
 <x-buttonup></x-buttonup>
<x-footer></x-footer>
    <script src="JS/script.js"></script>
</body>
</html>
