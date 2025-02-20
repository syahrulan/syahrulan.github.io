<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="{{ asset('CSS/post.css') }}">
<x-head></x-head>
<body>
    <x-navbar></x-navbar>

<!-- Upper border Start -->
<div class="text-up">
</div>
<!-- Upper border End -->
 
<!-- Update News Start -->
 <div class="update-news">
    <div class="container">
        <!-- Bagian Kiri -->
        <div class="left-content">
            <div class="news-item">
                <h2>What is PBL?</h2>
                <img src="../img/Asset 3.png" alt="Foto Berita">
                <p>Project based learning atau pembelajaran berbasis proyek merupakan model pembelajaran yang berpusat pada peserta didik, yang mana partisipasi untuk melakukan suatu investigasi yang mendalam terhadap suatu topik bergantung peran dari peserta didik itu sendiri. Siswa secara konstruktif melakukan pendalaman pembelajaran dengan pendekatan berbasis riset terhadap permasalahan dan pertanyaan yang berbobot, nyata, dan relevan. Project Based Learning (PBL) adalah metode pengajaran sistematis yang melibatkan siswa dalam mempelajari pengetahuan penting dan keterampilan abad ke-21 (21st Century Skills) melalui proses penyelidikan yang mendalam, dipengaruhi oleh siswa, terstruktur melalui proyek yang dirancang dengan cermat. Project Based Learning (PBL) adalah pedagogi yang berpusat pada siswa yang melibatkan pendekatan kelas dinamis di mana diyakini bahwa siswa memperoleh pengetahuan yang lebih dalam melalui eksplorasi aktif terhadap tantangan dan masalah dunia nyata (Edutopia, online). </p>
                <p>Siswa belajar tentang suatu subjek dengan bekerja dalam waktu yang lama untuk menyelidiki dan menanggapi pertanyaan, tantangan, atau masalah yang kompleks (PBL Works, online). Ini adalah gaya belajar aktif dan pembelajaran berbasis inkuiri. PBL kontras dengan berbasis kertas, menghafal, atau instruksi yang dipimpin guru yang menyajikan fakta-fakta mapan atau menggambarkan jalan mulus menuju pengetahuan dengan mengajukan pertanyaan, masalah atau scenario (Vogler, 4 2017).</p>
                <p>Metode PBL juga dapat diartikan Problem Based Learning ataupun Product Based Learning. Salah satu cara untuk memikirkan perbedaan antara ketiganya adalah dengan melihat hasilnya. Dalam Project Based Learning dan Product Based Learning, siswa harus menghasilkan artefak/produk untuk menunjukkan penguasaan konten mereka. Sementara Problem Based Learning, siswa harus menyajikan solusi untuk masalah otentik atau skenario tertentu yang telah didefinisikan dengan jelas (Edutopia, Online).</p>
            </div>
        </div>
        <!-- Bagian Kanan -->
        <div class="right-content">
            <div class="recent-news">
                <h3>Berita Terkini</h3>
                <ul>
                @foreach (\App\Models\Post::getRecentNews() as $post)
                <li><a href="/posts/{{$post['slug']}}">{{ $loop->iteration }}. {{ Str::limit($post->title, 100) }}</a>
                <p>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, j F Y') }}</p>
                </li>
            @endforeach
                </ul>
            </div>
        </div>
    </div>
 </div>
<!-- Update News End -->
<x-buttonup></x-buttonup>
<x-footer></x-footer>
<script src="{{ asset('JS/script.js') }}"></script>
</body>
</html>
