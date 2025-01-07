<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin - @yield('title')</title>
    <!-- CSS files -->
    <link href="{{ asset('./dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    {{-- Trix  --}}
    <script src="{{ asset('trix/trix.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('trix/trix.css') }}">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        #logo {
            width: auto;
            height: 30px;
        }
    </style>
    {{-- End Trix --}}
    {{-- data table CDN --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
    {{-- end datatable --}}
    <script src="{{ asset('selectbox/dselect.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('selectbox/dselect.scss') }}">

</head>

<body>
    <script src="{{ asset('./dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page">
        <!-- Navbar -->
        <div class="sticky-top">
            <header class="navbar navbar-expand-md sticky-top d-print-none">
                <div class="container-xl">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                        <a href="#" class="text-blue text-decoration-none">
                            <img src="{{ asset('static/photos/LOGO UMI.png') }}" id="logo" alt=""
                                srcset="">
                            SIKAK<span class="ms-1">UMI</span>
                        </a>
                    </h1>
                    <div class="navbar-nav flex-row order-md-last">
                        <div class="d-none d-md-flex me-3">
                            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                                data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                </svg>
                            </a>
                            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                                data-bs-toggle="tooltip" data-bs-placement="bottom">
                                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path
                                        d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                </svg>
                            </a>

                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                                aria-label="Open user menu">
                                <span class="avatar avatar-sm"
                                    style="background-image: url({{ Avatar::create(Auth::user()->name)->toBase64() }})"></span>
                                <div class="d-none d-xl-block ps-2">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="mt-1 small text-secondary">
                                        @if (Auth::user()->role == 'admin')
                                            Administrator
                                        @endif
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a href="{{ route('logout') }}"onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"
                                    class="dropdown-item">Logout</a>
                            </div>
                            <form hidden id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <header class="navbar-expand-md">
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="navbar">
                        <div class="container-xl">
                            <ul class="navbar-nav">
                                <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('/dashboard') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="fa-solid fa-gauge"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li
                                    class="nav-item dropdown {{ request()->routeIs('kelolauser.index', 'kelolauser.create', 'kelolauser.edit') || request()->routeIs('enduser.index', 'enduser.create', 'enduser.edit') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="fa-solid fa-users-gear"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            kelola User
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item {{ request()->routeIs('kelolauser.index', 'kelolauser.create', 'kelolauser.edit') ? 'active' : '' }}"
                                            href="{{ route('kelolauser.index') }}">
                                            Admin
                                        </a>
                                        <a class="dropdown-item {{ request()->routeIs('enduser.index', 'enduser.create', 'enduser.edit') ? 'active' : '' }}"
                                            href="{{ route('enduser.index') }}">
                                            User
                                        </a>
                                    </div>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('alumni.index', 'alumni.create', 'alumni.edit') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('alumni.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="fa-solid fa-graduation-cap"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Alumni
                                        </span>
                                    </a>
                                </li>
                                <li
                                    class="nav-item dropdown {{ request()->routeIs('prodi.index', 'prodi.create', 'prodi.edit') || request()->routeIs('peminatan.index', 'peminatan.create', 'peminatan.edit') || request()->routeIs('dosen.index', 'dosen.create', 'dosen.edit') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="fa-solid fa-school-flag"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Akademik
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item {{ request()->routeIs('dosen.index', 'dosen.create', 'dosen.edit') ? 'active' : '' }}"
                                            href="{{ route('dosen.index') }}">
                                            Dosen
                                        </a>
                                        <a class="dropdown-item {{ request()->routeIs('prodi.index', 'prodi.create', 'prodi.edit') ? 'active' : '' }}"
                                            href="{{ route('prodi.index') }}">
                                            Program Studi
                                        </a>
                                        <a class="dropdown-item {{ request()->routeIs('peminatan.index', 'peminatan.create', 'peminatan.edit') ? 'active' : '' }}"
                                            href="{{ route('peminatan.index') }}">
                                            Peminatan
                                        </a>
                                    </div>
                                </li>
                                <li
                                    class="nav-item dropdown {{ request()->routeIs('berita.index', 'berita.create', 'berita.edit') || request()->routeIs('gallery.index', 'gallery.create', 'gallery.edit') || request()->routeIs('Video.index', 'Video.create', 'Video.edit') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="fa-solid fa-arrows-to-circle"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Konten
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item {{ request()->routeIs('berita.index', 'berita.create', 'berita.edit') ? 'active' : '' }}"
                                            href="{{ route('berita.index') }}">
                                            Berita
                                        </a>
                                        <a class="dropdown-item {{ request()->routeIs('gallery.index', 'gallery.create', 'gallery.edit') ? 'active' : '' }}"
                                            href="{{ route('gallery.index') }}">
                                            Foto
                                        </a>
                                        <a class="dropdown-item {{ request()->routeIs('Video.index', 'Video.create', 'Video.edit') ? 'active' : '' }}"
                                            href="{{ route('Video.index') }}">
                                            Video
                                        </a>
                                    </div>
                                </li>
                                {{-- <li class="nav-item ">
                                    <a class="nav-link" href="#">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Alumni Tracer
                                        </span>
                                    </a>
                                </li> --}}
                                <li
                                    class="nav-item dropdown {{ request()->routeIs('cooperation.index', 'cooperation.create', 'cooperation.edit') || request()->routeIs('cooperation-type.index', 'cooperation-type.create', 'cooperation-type.edit') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="fa-solid fa-handshake"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Kelola Kerjasama
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item {{ request()->routeIs('cooperation-type.index', 'cooperation-type.create', 'cooperation-type.edit') ? 'active' : '' }}"
                                            href="{{ route('cooperation-type.index') }}">
                                            Jenis Kerjasama
                                        </a>
                                        <a class="dropdown-item {{ request()->routeIs('cooperation.index') ? 'active' : '' }}"
                                            href="{{ route('cooperation.index', 'cooperation.create', 'cooperation.edit') }}">
                                            Kerjasama
                                        </a>
                                    </div>
                                </li>
                                <li
                                    class="nav-item dropdown {{ request()->routeIs('kategori_mahasiswa.index', 'kategori_mahasiswa.create', 'kategori_mahasiswa.edit') || request()->routeIs('mahasiswa.index', 'mahasiswa.create', 'mahasiswa.edit') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="fa-solid fa-user-group"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Kemahasiswaan
                                        </span>
                                    </a>
                                    <div
                                        class="dropdown-menu {{ request()->routeIs('kategori_mahasiswa.index', 'kategori_mahasiswa.create', 'kategori_mahasiswa.edit') ? 'active' : '' }}">
                                        <a class="dropdown-item " href="{{ route('kategori_mahasiswa.index') }}">
                                            Kategori Mahasiswa
                                        </a>
                                        <a class="dropdown-item {{ request()->routeIs('mahasiswa.index', 'mahasiswa.create', 'mahasiswa.edit') ? 'active' : '' }} }} "
                                            href="{{ route('mahasiswa.index') }}">
                                            Mahasiswa
                                        </a>
                                    </div>
                                </li>
                                <li
                                    class="nav-item {{ request()->routeIs('jobfair.index') || request()->routeIs('jobfair.edit') || request()->routeIs('jobfair.create') ? 'active' : '' }} ">
                                    <a class="nav-link" href="{{ route('jobfair.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="fa-solid fa-briefcase"></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Lowongan
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <div class="page-wrapper">
            <!-- Page header -->

            <!-- Page body -->
            <div class="page-body">
                @yield('content')
            </div>
            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2024
                                    <a href="." class="link-secondary">Alumni UMI</a>.
                                    All rights reserved.
                                </li>
                                <li class="list-inline-item">
                                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                                        v1.0.0
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('./dist/libs/apexcharts/dist/apexcharts.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/libs/jsvectormap/dist/maps/world.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('./dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/js/demo.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/libs/tinymce/tinymce.min.js?1692870487') }}" defer></script>
    @stack('graph')
    @stack('MCE')
    @stack('script')
    @include('sweetalert::alert')
    <script>
        new DataTable('#example', {
            responsive: true
        });
    </script>
</body>

</html>
