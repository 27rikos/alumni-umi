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
                                    <span class="bg-primary text-white avatar">
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
                                        {{ $mahasiswa }} <spanc class="me-1">Mahasiswa</span>
                                    </div>
                                    <div class="text-secondary">
                                        <a href="{{ route('mahasiswa.index') }}"
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
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div id="simple-pie-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div id="provinsi-pie-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div id="bar-chart-mahasiswa-per-tahun"></div>
                </div>
            </div>
        </div>
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
                colors: ['#1E90FF'],
                legend: {
                    show: false,
                },
                title: {
                    text: 'Jumlah Alumni Per Stambuk', // Judul chart bar
                    align: 'center',
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                        color: '#333'
                    }
                }
            })).render();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Data dari Laravel
            const labels = {!! json_encode($labels) !!};
            const series = {!! json_encode($values) !!};

            // Inisialisasi Simple Pie Chart dengan teks dan border putih
            new ApexCharts(document.querySelector("#simple-pie-chart"), {
                chart: {
                    type: "pie",
                    height: 600
                },
                series: series,
                labels: labels,
                colors: ["#1E90FF", "#32CD32", "#FFD700", "#FF6347", "#8A2BE2"],
                dataLabels: {
                    style: {
                        colors: ['#FFFFFF'], // Mengubah warna teks menjadi putih
                    },
                    dropShadow: {
                        enabled: false
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                        },
                        borderColor: "#FFFFFF", // Mengubah border chart menjadi putih
                        borderWidth: 2 // Lebar border
                    }
                },
                stroke: {
                    width: 2,
                    colors: ["#FFFFFF"], // Border putih untuk keseluruhan pie
                },
                title: {
                    text: 'Jumlah Mahasiswa Per Kabupaten/Kota', // Judul chart pie
                    align: 'center',
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                        color: '#333'
                    }
                }
            }).render();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Data untuk chart provinsi dari Laravel
            const provinceNames = {!! json_encode($province_names) !!};
            const provinceValues = {!! json_encode($province_values) !!};

            // Inisialisasi Pie Chart Provinsi
            new ApexCharts(document.querySelector("#provinsi-pie-chart"), {
                chart: {
                    type: "pie",
                    height: 600
                },
                title: {
                    text: 'Jumlah Mahasiswa per Provinsi', // Judul chart
                    align: 'center', // Menempatkan judul di tengah
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold',
                        color: '#000000' // Mengatur warna judul menjadi hitam
                    }
                },
                series: provinceValues,
                labels: provinceNames,
                colors: ["#1E90FF", "#32CD32", "#FFD700", "#FF6347", "#8A2BE2"],
                dataLabels: {
                    style: {
                        colors: ['#FFFFFF'], // Mengubah warna teks menjadi putih
                    },
                    dropShadow: {
                        enabled: false
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                        },
                        borderColor: "#FFFFFF", // Mengubah border chart menjadi putih
                        borderWidth: 2 // Lebar border
                    }
                },
                stroke: {
                    width: 2,
                    colors: ["#FFFFFF"], // Border putih untuk keseluruhan pie
                }

            }).render();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Data dari Controller
            const years = @json($yearstahunmasuk); // Tahun masuk
            const counts = @json($countstahunmasuk); // Jumlah mahasiswa per tahun

            // Membuat bar chart menggunakan ApexCharts
            new ApexCharts(document.querySelector("#bar-chart-mahasiswa-per-tahun"), {
                chart: {
                    type: "bar",
                    height: 400
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%',
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                series: [{
                    name: "Jumlah Mahasiswa",
                    data: counts
                }],
                xaxis: {
                    categories: years,
                    title: {
                        text: 'Tahun Masuk'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Mahasiswa'
                    }
                },
                title: {
                    text: 'Jumlah Mahasiswa Per Tahun Masuk',
                    align: 'center',
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                        color: '#333'
                    }
                },
                tooltip: {
                    theme: 'light'
                }
            }).render();
        });
    </script>
@endpush
