<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
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
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
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
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#">Alumni <span class="text-primary">UMI</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->routeIs('main') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('main') }}">Home</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('pencarian') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('pencarian') }}">Alumni</a>
                    </li>
                    <li
                        class="nav-item dropdown {{ request()->routeIs('video') || request()->routeIs('foto') ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gallery
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item {{ request()->routeIs('video') ? 'active' : '' }}"
                                href="{{ route('video') }}">Video</a>
                            <a class="dropdown-item {{ request()->routeIs('foto') ? 'active' : '' }}"
                                href="{{ route('foto') }}">Foto</a>
                        </div>
                    </li>
                    <li class="nav-item {{ request()->routeIs('old-news') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('old-news') }}">Berita</a>
                    </li>
                    <!-- Add spacing before Sign In and Sign Up buttons -->
                    <li class="nav-item mr-4"></li>
                    <li class="nav-item mb-1 ">
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('login') }}">Sign In</a>
                    </li>
                    <li class="nav-item mx-1"></li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm" href="{{ route('register') }}">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="content">
        @yield('content')
    </main>
    <!-- News Section -->
    <footer class="footer mt-3 text-light">
        <div class="container p-3">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-light">VISIT US:</h5>
                    <ul class="list-unstyled">
                        <li class="text-light mb-2">
                            <i class="fas fa-location-dot fa-lg mr-2"></i>
                            Jl. Hang Tuah No. 8 Madras Hulu, Kecamatan Medan Polonia, Kota Medan, Sumatra Utara
                        </li>
                        <li class="text-light">
                            <i class="fa-solid fa-globe mt-2 mr-2"></i>
                            <a href="https://www.methodist.ac.id" class="text-light">www.methodist.ac.id</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5 class="text-light mb-3">FOLLOW US:</h5>
                    <ul class="d-flex justify-content-start p-0 list-unstyled">
                        <li class="mr-3">
                            <a href="https://www.facebook.com/fikom.univmethodist?mibextid=ZbWKwL" class="text-light">
                                <i class="fab fa-facebook fa-2x"></i>
                            </a>
                        </li>
                        <li class="mr-3">
                            <a href="#" class="text-light">
                                <i class="fab fa-telegram fa-2x"></i>
                            </a>
                        </li>
                        <li class="mr-3">
                            <a href="https://instagram.com/prodi_si_fikom_umi?igshid=MjEwN2IyYWYwYw=="
                                class="text-light">
                                <i class="fab fa-instagram fa-2x"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/@fikomumi5881/about" class="text-light">
                                <i class="fab fa-youtube fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-3">OUR LOCATION:</h5>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.0369967861297!2d98.6678751733135!3d3.5789729503635677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131d2ca9e8e4f%3A0x8f9e1923eea126ac!2sIndonesian%20Methodist%20University!5e0!3m2!1sen!2sid!4v1731335211151!5m2!1sen!2sid"
                        width="100%" height="150" style="border:0; border-radius:5px" allowfullscreen=""
                        loading="lazy"></iframe>
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

</body>

</html>
