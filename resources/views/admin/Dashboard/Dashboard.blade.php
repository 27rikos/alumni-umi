@extends('partials.AdminDashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xl min-vh-100">
        <div class="page-header d-print-none mb-5">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page Title and Breadcrumb Container -->
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Page Title -->
                            <h2 class="page-title mt-3">
                                Dashboard
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span
                                        class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $alumni }} <span class="me-1">Alumni</span>
                                    </div>
                                    <div class="text-secondary">
                                        <a href="{{ route('alumni.index') }}"
                                            class="d-flex justify-content-between text-decoration-none">
                                            <span>Detail</span> <i class="fa-solid fa-arrow-right me-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-twitter text-white avatar">
                                        <i class="fa-solid fa-users"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $user }} <span class="me-1">User</span>
                                    </div>
                                    <div class="text-secondary">
                                        <a href="{{ route('kelolauser.index') }}"
                                            class="d-flex justify-content-between text-decoration-none">
                                            <span>Detail</span> <i class="fa-solid fa-arrow-right me-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-green text-white avatar">
                                        <i class="fa-solid fa-check-double"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $approved }} <spanc class="me-1">Approve</span>
                                    </div>
                                    <div class="text-secondary">
                                        <a href="{{ route('alumni.index') }}"
                                            class="d-flex justify-content-between text-decoration-none">
                                            <span>Detail</span> <i class="fa-solid fa-arrow-right me-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-danger text-white avatar">
                                        <i class="fa-solid fa-hourglass-half"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">
                                        {{ $pending }} <span class="me-1">Pending</span>
                                    </div>
                                    <div class="text-secondary">
                                        <a href="{{ route('alumni.index') }}"
                                            class="d-flex justify-content-between text-decoration-none">
                                            <span>Detail</span> <i class="fa-solid fa-arrow-right me-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div id="chart-jurusan"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="chart-tren"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <div id="chart-pekerjaan"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('graph')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Data jumlah alumni berdasarkan stambuk
        const options = {
            chart: {
                type: 'bar',
                height: 350
            },
            title: {
                text: 'Jumlah Alumni Berdasarkan Stambuk',
                align: 'center'
            },
            xaxis: {
                categories: ['2020', '2021', '2022', '2023'] // Tahun Stambuk
            },
            series: [{
                name: 'Jumlah Alumni',
                data: [50, 75, 100, 60] // Jumlah alumni untuk masing-masing stambuk
            }],
            yaxis: {
                title: {
                    text: 'Jumlah Alumni'
                }
            }
        };

        // Render chart
        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
    <script>
        const optionsJurusan = {
            chart: {
                type: 'pie',
                height: 350
            },
            title: {
                text: 'Distribusi Alumni Berdasarkan Jurusan',
                align: 'center'
            },
            series: [40, 30, 20, 10], // Persentase alumni untuk masing-masing jurusan
            labels: ['Teknik', 'Ekonomi', 'Ilmu Komunikasi', 'Seni'] // Nama jurusan
        };

        const chartJurusan = new ApexCharts(document.querySelector("#chart-jurusan"), optionsJurusan);
        chartJurusan.render();
    </script>
    <script>
        const optionsTren = {
            chart: {
                type: 'line',
                height: 350
            },
            title: {
                text: 'Tren Jumlah Alumni dari Tahun ke Tahun',
                align: 'center'
            },
            xaxis: {
                categories: ['2019', '2020', '2021', '2022', '2023'] // Tahun
            },
            series: [{
                name: 'Jumlah Alumni',
                data: [120, 150, 180, 200, 220] // Jumlah alumni untuk setiap tahun
            }]
        };

        const chartTren = new ApexCharts(document.querySelector("#chart-tren"), optionsTren);
        chartTren.render();
    </script>
    <script>
        const optionsPekerjaan = {
            chart: {
                type: 'bar',
                height: 350
            },
            title: {
                text: 'Data Alumni Berdasarkan Jenis Pekerjaan',
                align: 'center'
            },
            xaxis: {
                categories: ['Pekerja Kantoran', 'Wirausaha', 'Freelancer', 'Lainnya'] // Jenis Pekerjaan
            },
            series: [{
                name: 'Jumlah Alumni',
                data: [100, 80, 50, 30] // Jumlah alumni untuk setiap jenis pekerjaan
            }]
        };

        const chartPekerjaan = new ApexCharts(document.querySelector("#chart-pekerjaan"), optionsPekerjaan);
        chartPekerjaan.render();
    </script>
@endpush
