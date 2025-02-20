<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shilau</title> <!-- Title tanpa gambar -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('CSS/post.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Untuk ikon media sosial -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <x-navbar></x-navbar>

    <!-- Upper border Start -->
    <div class="text-up">
        <h1>PBL</h1>      
    </div>
    <!-- Upper border End -->

    <!-- Update News Start -->
    <div class="update-news">
        <div class="container">
            <!-- Bagian Kiri -->
            <div class="left-content">
                <div class="news-item">
                    <h2>{{ $pblpage['title'] }}</h2>
                    <video src="{{ asset($pblpage['video']) }}" controls></video>
                    <p>{{ $pblpage['body'] }}</p>
                </div>
            </div>

            <!-- Bagian Kanan -->
            <div class="right-content">
                <div class="recent-news">
                    <h3>Berita Terkini</h3>
                    <ul>
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
