<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Sacramento&family=Work+Sans:ital,wght@0,100;0,400;1,600&display=swap"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('front.css') }}">

    {{-- Fancy App --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</head>
<body>
    <section class="min-vh-100">
        <nav class="navbar navbar-expand-lg  bg-body-tertiary navbar-light shadow sticky-top ">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">Alumni <span class="name">UMI</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item">
                            <a class="nav-link active " href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/pencarian">Pencarian</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link active" href="#"data-bs-toggle="dropdown" aria-expanded="false">Gallery</a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="/media/foto">Foto</a></li>
                                  <li><a class="dropdown-item" href="/media/video">Video</a></li>
                                </ul>
                              </div>
                           
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/lowongan">Lowongan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <div class="content">
        </div>
    </section>
    <footer class="footer mt-3 text-light">
        <div class="container p-3">
            <div class="row ">
                <div class="col">
                    <h5>CONTACT:</h5>
                    <ul>
                    <i class="fa-solid fa-location-dot fa-lg"></i>
                        <li class="i text-light mb-2"> Jl. Hang Tuah No. 8 Madras Hulu, Kecamatan Medan Polonia, Kota
                            Medan, Sumatra Utara</li>
                        <i class="fa-solid fa-envelope fa-xl  mt-2"></i>
                        <li class="i text-light">www.methodist.ac.id</li>
                    </ul>
                </div>
                <div class="col ms-2">
                    <h5 class="media mb-3">FOLLOW US:</h5>
                    <ul class="d-flex">
                        <li class="icons me-3"> <a href="https://www.facebook.com/fikom.univmethodist?mibextid=ZbWKwL"><i class="fa-brands fa-facebook fa-2xl"style="color: #f7f7f7;" ></i></a>
                        </li>
                        <li class="icons me-3"> <a href="#"><i class="fa-brands fa-telegram fa-2xl" style="color: #f7f7f7;"></i></a>
                        </li>
                        <li class="icons me-3"> <a href="https://instagram.com/prodi_si_fikom_umi?igshid=MjEwN2IyYWYwYw=="><i class="fa-brands fa-instagram fa-2xl" style="color: #f7f7f7;"></i></a>
                        </li>
                        <li class="icons"> <a href="https://www.youtube.com/@fikomumi5881/about"><i class="fa-brands fa-youtube fa-2xl" style="color: #f7f7f7;"></i></a>
                        </li>
                    </ul>
                </div>
               
            </div>
        </div>
      <div class="text-center p-3 ">
        &copy;2023 Copyright : <a href="/" class="text-light">UNIVERSITAS METHODIST INDONESIA</a>
      </div>
    </footer>
    <script src="../js/pencarian.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>


</html>



