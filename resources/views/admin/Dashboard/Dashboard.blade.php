@extends('Partials.AdminDashboard')
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
                    <label for="year-filter" class="form-label">Pilih Tahun Masuk:</label>
                    <select id="year-filter" class="form-select mb-3">
                        <option value="">Pilih Tahun Masuk</option>
                    </select>
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
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div id="bar-chart-city"></div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div id="bar-chart-province"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('graph')
    <script>
        // Menyisipkan data tahun dari PHP ke JavaScript
        const years = @json($years);

        // Menghilangkan duplikat dengan menggunakan Set, kemudian mengurutkan
        const uniqueYears = [...new Set(years)].sort();

        // Menambahkan opsi ke dalam dropdown
        const selectElement = document.getElementById("year-filter");

        uniqueYears.forEach(year => {
            const option = document.createElement("option");
            option.value = year;
            option.textContent = year;
            selectElement.appendChild(option);
        });
    </script>
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
            // Data dari Laravel untuk kota
            const cityLabels = {!! json_encode($labels) !!};
            const cityValues = {!! json_encode($values) !!};
            const cityYears = {!! json_encode($years) !!};

            // Data untuk chart provinsi dari Laravel
            const provinceNames = {!! json_encode($province_names) !!};
            const provinceValues = {!! json_encode($province_values) !!};
            const provinceYears = {!! json_encode($province_years) !!};

            // Function to calculate total per city
            function calculateCityTotals() {
                const cityTotals = {};
                cityLabels.forEach((city, index) => {
                    if (!cityTotals[city]) {
                        cityTotals[city] = 0;
                    }
                    cityTotals[city] += cityValues[index];
                });
                return {
                    labels: Object.keys(cityTotals),
                    values: Object.values(cityTotals)
                };
            }

            // Function to calculate total per province
            function calculateProvinceTotals() {
                const provinceTotals = {};
                provinceNames.forEach((province, index) => {
                    if (!provinceTotals[province]) {
                        provinceTotals[province] = 0;
                    }
                    provinceTotals[province] += provinceValues[index];
                });
                return {
                    labels: Object.keys(provinceTotals),
                    values: Object.values(provinceTotals)
                };
            }

            // Get initial totals
            const cityTotals = calculateCityTotals();
            const provinceTotals = calculateProvinceTotals();

            // Inisialisasi Pie Chart Kota
            const cityPieChart = new ApexCharts(document.querySelector("#simple-pie-chart"), {
                chart: {
                    type: "pie",
                    height: 600
                },
                series: cityTotals.values,
                labels: cityTotals.labels,
                colors: ["#1E90FF", "#32CD32", "#FFD700", "#FF6347", "#8A2BE2"],
                dataLabels: {
                    style: {
                        colors: ['#FFFFFF'],
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
                        borderColor: "#FFFFFF",
                        borderWidth: 2
                    }
                },
                stroke: {
                    width: 2,
                    colors: ["#FFFFFF"],
                },
                title: {
                    text: 'Jumlah Mahasiswa Per Kota',
                    align: 'center',
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                        color: '#333'
                    }
                }
            });

            cityPieChart.render();

            // Inisialisasi Pie Chart Provinsi
            const provincePieChart = new ApexCharts(document.querySelector("#provinsi-pie-chart"), {
                chart: {
                    type: "pie",
                    height: 600
                },
                series: provinceTotals.values,
                labels: provinceTotals.labels,
                colors: ["#1E90FF", "#32CD32", "#FFD700", "#FF6347", "#8A2BE2"],
                dataLabels: {
                    style: {
                        colors: ['#FFFFFF'],
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
                        borderColor: "#FFFFFF",
                        borderWidth: 2
                    }
                },
                stroke: {
                    width: 2,
                    colors: ["#FFFFFF"],
                },
                title: {
                    text: 'Jumlah Mahasiswa Per Provinsi',
                    align: 'center',
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold',
                        color: '#000000'
                    }
                }
            });

            provincePieChart.render();

            // Event listener untuk filter Tahun Masuk
            document.getElementById("year-filter").addEventListener("change", function() {
                const selectedYear = this.value;

                if (selectedYear) {
                    // Filter data untuk Kota berdasarkan tahun
                    const filteredCityLabels = cityLabels.filter((label, index) => cityYears[index] ===
                        selectedYear);
                    const filteredCityValues = cityValues.filter((value, index) => cityYears[index] ===
                        selectedYear);

                    // Update chart Kota dengan data yang sudah difilter
                    cityPieChart.updateOptions({
                        series: filteredCityValues,
                        labels: filteredCityLabels,
                    });

                    // Filter data untuk Provinsi berdasarkan tahun
                    const filteredProvinceNames = provinceNames.filter((name, index) => provinceYears[
                        index] === selectedYear);
                    const filteredProvinceValues = provinceValues.filter((value, index) => provinceYears[
                        index] === selectedYear);

                    // Update chart Provinsi dengan data yang sudah difilter
                    provincePieChart.updateOptions({
                        series: filteredProvinceValues,
                        labels: filteredProvinceNames,
                    });
                } else {
                    // Jika tidak ada tahun yang dipilih, tampilkan total keseluruhan data
                    cityPieChart.updateOptions({
                        series: cityTotals.values,
                        labels: cityTotals.labels,
                    });

                    provincePieChart.updateOptions({
                        series: provinceTotals.values,
                        labels: provinceTotals.labels,
                    });
                }
            });
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Data dari Laravel untuk kota dan provinsi
            const cityLabels = {!! json_encode($labels) !!};
            const cityValues = {!! json_encode($values) !!};
            const provinceNames = {!! json_encode($province_names) !!};
            const provinceValues = {!! json_encode($province_values) !!};

            // Calculate totals for each city
            const cityTotals = {};
            cityLabels.forEach((city, index) => {
                if (!cityTotals[city]) {
                    cityTotals[city] = 0;
                }
                cityTotals[city] += cityValues[index];
            });

            // Calculate totals for each province
            const provinceTotals = {};
            provinceNames.forEach((province, index) => {
                if (!provinceTotals[province]) {
                    provinceTotals[province] = 0;
                }
                provinceTotals[province] += provinceValues[index];
            });

            // Sort data in descending order
            const sortedCityData = Object.entries(cityTotals)
                .sort(([, a], [, b]) => b - a);

            const sortedProvinceData = Object.entries(provinceTotals)
                .sort(([, a], [, b]) => b - a);

            // Create City Bar Chart
            const cityBarChart = new ApexCharts(document.querySelector("#bar-chart-city"), {
                chart: {
                    type: 'bar',
                    height: 1500,
                    toolbar: {
                        show: true,
                        tools: {
                            download: true
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                series: [{
                    name: 'Jumlah Mahasiswa',
                    data: sortedCityData.map(([, value]) => value)
                }],
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val.toFixed(0);
                    },
                    offsetX: 30,
                    style: {
                        fontSize: '12px',
                        colors: ['#333']
                    }
                },
                xaxis: {
                    categories: sortedCityData.map(([city]) => city),
                    labels: {
                        show: true,
                        style: {
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Kabupaten/Kota',
                        style: {
                            fontSize: '12px',
                            fontWeight: 600
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Mahasiswa',
                        style: {
                            fontSize: '12px',
                            fontWeight: 600
                        }
                    }
                },
                title: {
                    text: 'Jumlah Total Mahasiswa Per Kabupaten/Kota',
                    align: 'center',
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                        color: '#333'
                    }
                },
                tooltip: {
                    y: {
                        formatter: (value) => Math.round(value) + " Mahasiswa"
                    }
                }
            });

            cityBarChart.render();

            // Create Province Bar Chart
            const provinceBarChart = new ApexCharts(document.querySelector("#bar-chart-province"), {
                chart: {
                    type: 'bar',
                    height: 1000,
                    toolbar: {
                        show: true,
                        tools: {
                            download: true
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                series: [{
                    name: 'Jumlah Mahasiswa',
                    data: sortedProvinceData.map(([, value]) => value)
                }],
                dataLabels: {
                    enabled: true,
                    formatter: function(val) {
                        return val.toFixed(0);
                    },
                    offsetX: 30,
                    style: {
                        fontSize: '12px',
                        colors: ['#333']
                    }
                },
                xaxis: {
                    categories: sortedProvinceData.map(([province]) => province),
                    labels: {
                        show: true,
                        style: {
                            fontSize: '12px'
                        }
                    },
                    title: {
                        text: 'Provinsi',
                        style: {
                            fontSize: '12px',
                            fontWeight: 600
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Mahasiswa',
                        style: {
                            fontSize: '12px',
                            fontWeight: 600
                        }
                    }
                },
                title: {
                    text: 'Jumlah Total Mahasiswa Per Provinsi',
                    align: 'center',
                    style: {
                        fontSize: '18px',
                        fontWeight: 'bold',
                        color: '#333'
                    }
                },
                tooltip: {
                    y: {
                        formatter: (value) => Math.round(value) + " Mahasiswa"
                    }
                }
            });

            provinceBarChart.render();

            // Event listener untuk filter Tahun Masuk
            document.getElementById("year-filter").addEventListener("change", function() {
                const selectedYear = this.value;

                if (selectedYear) {
                    // Filter and calculate totals for selected year - Cities
                    const filteredCityTotals = {};
                    cityLabels.forEach((city, index) => {
                        if (cityYears[index] === selectedYear) {
                            if (!filteredCityTotals[city]) {
                                filteredCityTotals[city] = 0;
                            }
                            filteredCityTotals[city] += cityValues[index];
                        }
                    });

                    // Filter and calculate totals for selected year - Provinces
                    const filteredProvinceTotals = {};
                    provinceNames.forEach((province, index) => {
                        if (provinceYears[index] === selectedYear) {
                            if (!filteredProvinceTotals[province]) {
                                filteredProvinceTotals[province] = 0;
                            }
                            filteredProvinceTotals[province] += provinceValues[index];
                        }
                    });

                    // Sort filtered data
                    const sortedFilteredCityData = Object.entries(filteredCityTotals)
                        .sort(([, a], [, b]) => b - a);
                    const sortedFilteredProvinceData = Object.entries(filteredProvinceTotals)
                        .sort(([, a], [, b]) => b - a);

                    // Update charts
                    cityBarChart.updateOptions({
                        series: [{
                            data: sortedFilteredCityData.map(([, value]) => value)
                        }],
                        xaxis: {
                            categories: sortedFilteredCityData.map(([city]) => city)
                        }
                    });

                    provinceBarChart.updateOptions({
                        series: [{
                            data: sortedFilteredProvinceData.map(([, value]) => value)
                        }],
                        xaxis: {
                            categories: sortedFilteredProvinceData.map(([province]) => province)
                        }
                    });
                } else {
                    // Reset to show all data
                    cityBarChart.updateOptions({
                        series: [{
                            data: sortedCityData.map(([, value]) => value)
                        }],
                        xaxis: {
                            categories: sortedCityData.map(([city]) => city)
                        }
                    });

                    provinceBarChart.updateOptions({
                        series: [{
                            data: sortedProvinceData.map(([, value]) => value)
                        }],
                        xaxis: {
                            categories: sortedProvinceData.map(([province]) => province)
                        }
                    });
                }
            });
        });
    </script>
@endpush
