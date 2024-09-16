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
    <title>Registrasi</title>
    <!-- CSS files -->
    <link href="{{ asset('./dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('./dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
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
            <form class="card card-md" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Registrasi</h2>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NPM</label>
                        <input type="text" class="form-control" placeholder="Masukkan NPM" name="npm">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan email" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password"
                            name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password-confirm" placeholder="Ulangi Password"
                            name="password_confirmation">
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-secondary mt-3">
                Sudah punya akun? <a href="{{ route('login') }}" tabindex="-1">Login</a>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('./dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('./dist/js/demo.min.js?1692870487') }}" defer></script>
</body>

</html>
