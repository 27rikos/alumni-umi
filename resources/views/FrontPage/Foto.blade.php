@extends('Partials.Frontpage')
@section('title', 'Gallery Foto')

@section('content')
    <section class="photo-gallery py-5 min-vh-100">
        <div class="container">
            <!-- Simple Header -->
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="fw-bold mb-2">Gallery Foto</h2>
                    <p class="text-muted">Koleksi foto kegiatan alumni yang penuh kenangan dan semangat.</p>
                </div>
            </div>

            <!-- Gallery Grid -->
            @if ($data->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="alert alert-info d-flex align-items-center" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            <div>Foto Belum Di Update</div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row g-4">
                    @foreach ($data as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <a href="{{ asset('images/foto/' . $item->file) }}" data-fancybox="gallery"
                                    class="text-decoration-none">
                                    <div class="card-img-top ratio ratio-4x3">
                                        <img src="{{ asset('images/foto/' . $item->file) }}"
                                            class="object-fit-cover w-100 h-100" alt="{{ $item->keterangan }}"
                                            loading="lazy">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <p class="card-text">{{ $item->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card img {
            transition: transform 0.3s ease;
        }

        .card:hover img {
            transform: scale(1.05);
        }

        .card-img-top {
            overflow: hidden;
        }

        .card-text {
            color: #333;
            font-size: 0.95rem;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Custom options
        });
    </script>
@endpush
