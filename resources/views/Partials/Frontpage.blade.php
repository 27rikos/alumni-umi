<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('main.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">SIKAKUMI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-2">
                        <a class="nav-link active" href="{{ route('main') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('old-news') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pencarian') }}">Alumni</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Gallery
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('foto') }}">Foto</a></li>
                            <li><a class="dropdown-item" href="{{ route('video') }}">Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kerjasama">Kerjasama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kemahasiswaan">Kemahasiswaan</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-light px-4">Sign In</a>
                    <a href="{{ route('register') }}" class="btn btn-primary-custom px-4">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p>
                        Alamat: Jl Hang Tuah no 8, Madras Hulu Medan Polonia, Medan, 20151 Phone. +62 61 415-7882 Fax.
                        +62 61 456-7533</p>
                </div>
                <div class="col-md-4">
                    <h5>Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('pencarian') }}" class="text-white">Alumni</a></li>
                        <li><a href="{{ route('old-news') }}" class="text-white">Berita</a></li>
                        <li><a href="{{ route('foto') }}" class="text-white">Foto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Media Sosial</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white">Facebook</a>
                        <a href="#" class="text-white">Twitter</a>
                        <a href="#" class="text-white">Instagram</a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 bg-light">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 SIKAK. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script>
        AOS.init();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    @stack('script-css')
</body>

</html>
