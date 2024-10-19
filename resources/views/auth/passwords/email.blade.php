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
    <title>Lupa password
    </title>
    <!-- CSS files -->
    <link href="{{ asset('./dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/fb034efa9e.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="#" class="navbar-brand navbar-brand-autodark text-blue">
                    Alumni <span>UMI</span><i class="fa-solid fa-graduation-cap fa-2x"></i>
                </a>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="card card-md" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Lupa password</h2>
                    <p class="text-secondary mb-4">Masukkan alamat email Anda yang sudah terdaftar pada aplikasi dan
                        kata sandi Anda akan diatur ulang dan
                        dikirimkan melalui email kepada Anda.</p>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Masukkan email" autofocus name="email">
                        <div class="form-footer">
                            <button class="btn btn-primary w-100" type="submit"><i
                                    class="fa-regular fa-envelope me-3 fa-1x"></i>Kirim Password Baru</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center text-secondary mt-3">
                Lupakan, <a href="{{ route('login') }}">Kembali</a> ke halamana login.
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('./dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/js/demo.min.js?1692870487') }}" defer></script>
</body>

</html>
