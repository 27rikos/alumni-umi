@extends('Partials.Frontpage')
@section('title', 'Home')
@section('content')

    <!-- Hero Section -->
    <section class="hero text-white py-5" id="home">
        <div class="container">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Sistem Informasi Kemahasiswaan, Alumni dan Kerjasama</h1>
                    <p class="lead mb-4">Platform terintegrasi yang menghubungkan mahasiswa, alumni, dan mitra industri
                        untuk menciptakan ekosistem akademik yang lebih baik.</p>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-custom">Mulai Sekarang</a>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <img src="{{ asset('img/graduate.jpg') }}" class="img-fluid rounded-3 shadow-lg"
                        alt="Hero Illustration">
                </div>
            </div>
        </div>
    </section>
    <!-- Carousel Kerjasama Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Mitra Kerjasama</h2>
            @if ($partner->isEmpty())
                <div class="alert alert-primary text-center w-100" role="alert">
                    Data Belum Tersedia
                </div>
            @else
                <div id="kerjasamaCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($partner->chunk(3) as $chunkIndex => $chunk)
                            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                <div class="d-flex justify-content-around align-items-center">
                                    @foreach ($chunk as $item)
                                        <img src="{{ asset('images/logo_instansi/' . $item->foto) }}"
                                            alt="{{ $item->instansi }}" class="img-fluid partner-logo"
                                            style="max-height: 100px;">
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#kerjasamaCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#kerjasamaCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif
        </div>
    </section>

    <section class="py-5" id="berita">
        <div class="container">
            <h2 class="text-center mb-4">Berita Terkini</h2>
            <div class="row g-4">
                @forelse ($datas as $item)
                    <div class="col-md-4">
                        <div class="card news-card h-100">
                            <div class="card-img-wrapper">
                                <span class="news-category">{{ $item->kategori->nama }}</span>
                                <img src="{{ asset('images/berita/' . $item->file) }}" width="400" height="300"
                                    class="card-img-top object-fit-cover" alt="Berita 1">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Prestasi Mahasiswa</h5>
                                <p class="card-text">{{ Str::limit(Strip_tags($item['konten']), 60, '...') }}</p>
                                <a href="/read/{{ $item->id }}" class="btn btn-primary-custom">Baca Selengkapnya</a>
                            </div>
                            <div class="card-footer text-muted">
                                <small>{{ $item->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection
