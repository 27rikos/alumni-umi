<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:ital,wght@0,100;0,400;1,600&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('front.css') }}" />
    {{-- Fancy App --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    {{-- end --}}
    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- end --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @stack('foto')
</head>
<style>
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1020;
    }

    .navbar-nav .nav-item .btn {
        width: 100%;
        margin-bottom: 10px;
    }

    @media (min-width: 992px) {
        .navbar-nav .nav-item .btn {
            width: auto;
            margin-bottom: 0;
        }
    }
</style>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand font-weight-bold" href="#">Alumni <span class="text-primary">UMI</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('main') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('pencarian') }}">Alumni</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gallery
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('video') }}">Video</a>
                        <a class="dropdown-item" href="{{ route('foto') }}">Foto</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('old-news') }}">Berita</a>
                </li>
                <li class="nav-item mb-1 pr-2">
                    <a class="btn btn-outline-primary " href="{{ route('login') }}">Log In</a>
                </li>
                <li class="nav-item pr-2">
                    <a class="btn btn-primary" href="{{ route('register') }}">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>


    <main class="content">
        @yield('content')
    </main>
    <!-- News Section -->
    <footer class="footer mt-3 text-light">
        <div class="container p-3">
            <div class="row">
                <div class="col">
                    <h5>CONTACT:</h5>
                    <ul>
                        <li class="text-light mb-2 list-unstyled">
                            <i class="fas fa-location-dot fa-lg"></i>
                            Jl. Hang Tuah No. 8 Madras Hulu, Kecamatan Medan Polonia, Kota Medan, Sumatra Utara
                        </li>
                        <li class="text-light list-unstyled">
                            <i class="fas fa-envelope fa-xl mt-2"></i>
                            www.methodist.ac.id
                        </li>
                    </ul>
                </div>
                <div class="col ml-2">
                    <h5 class="media mb-3">FOLLOW US:</h5>
                    <ul class="d-flex flex-row p-2">
                        <li class="icons mr-3">
                            <a href="https://www.facebook.com/fikom.univmethodist?mibextid=ZbWKwL">
                                <i class="fab fa-facebook fa-2x" style="color: #f7f7f7;"></i>
                            </a>
                        </li>
                        <li class="icons mr-3">
                            <a href="#">
                                <i class="fab fa-telegram fa-2x" style="color: #f7f7f7;"></i>
                            </a>
                        </li>
                        <li class="icons mr-3">
                            <a href="https://instagram.com/prodi_si_fikom_umi?igshid=MjEwN2IyYWYwYw==">
                                <i class="fab fa-instagram fa-2x" style="color: #f7f7f7;"></i>
                            </a>
                        </li>
                        <li class="icons">
                            <a href="https://www.youtube.com/@fikomumi5881/about">
                                <i class="fab fa-youtube fa-2x" style="color: #f7f7f7;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3">
            &copy;2024 Copyright :
            <a href="/" class="text-light">UNIVERSITAS METHODIST INDONESIA</a>
        </div>
    </footer>


    <script>
        AOS.init();
    </script>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
