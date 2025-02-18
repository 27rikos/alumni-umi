@extends('Partials.Frontpage')
@section('title', 'Video')

@section('content')
    <section class="video-gallery py-5 min-vh-100">
        <div class="container">
            <!-- Simple Header -->
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="fw-bold mb-2">Gallery Video</h2>
                    <p class="text-muted">Dapatkan informasi video kegiatan alumni terbaru.</p>
                </div>
            </div>

            <!-- Video Grid -->
            @if ($data->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="alert alert-info d-flex align-items-center" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            <div>Gallery Kosong</div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row g-4">
                    @foreach ($data as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <!-- Thumbnail -->
                                <div class="card-img-top ratio ratio-16x9">
                                    <img src="{{ asset('images/thumbnail/' . $item->file) }}"
                                        class="object-fit-cover w-100 h-100" alt="{{ $item->judul }}" loading="lazy">
                                </div>
                                <!-- Video Info -->
                                <div class="card-body">
                                    <h5 class="card-title mb-0">{{ $item->judul }}</h5>
                                </div>
                                <!-- Play Button Overlay -->
                                <a href="{{ $item->link }}" data-fancybox="video-gallery" class="video-link">
                                    <div class="play-button">
                                        <i class="bi bi-play-circle"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

@push('script-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .video-link {
            text-decoration: none;
            color: inherit;
        }

        .play-button {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .play-button i {
            font-size: 3rem;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .card:hover .play-button {
            opacity: 1;
        }

        .card-title {
            font-size: 1rem;
            color: #333;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>
@endpush
