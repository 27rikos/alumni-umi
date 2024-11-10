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
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div id="chart-tasks-overview"></div>
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
        {{-- <div class="col-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <div id="chart-pekerjaan"></div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@push('graph')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts && (new ApexCharts(document.getElementById('chart-tasks-overview'), {
                chart: {
                    type: "bar",
                    fontFamily: 'inherit',
                    height: 320,
                    parentHeightOffset: 0,
                    toolbar: {
                        show: false,
                    },
                    animations: {
                        enabled: false
                    },
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    opacity: 1,
                },
                series: [{
                    name: "Alumni Count",
                    data: @json($data) // Pass the data array from the controller
                }],
                tooltip: {
                    theme: 'dark'
                },
                grid: {
                    padding: {
                        top: -20,
                        right: 0,
                        left: -4,
                        bottom: -4
                    },
                    strokeDashArray: 4,
                },
                xaxis: {
                    labels: {
                        padding: 0,
                    },
                    tooltip: {
                        enabled: false
                    },
                    axisBorder: {
                        show: false,
                    },
                    categories: @json($categories), // Pass the categories array from the controller
                },
                yaxis: {
                    labels: {
                        padding: 4
                    },
                },
                colors: [tabler.getColor("primary")],
                legend: {
                    show: false,
                },
            })).render();
        });
    </script>
@endpush
