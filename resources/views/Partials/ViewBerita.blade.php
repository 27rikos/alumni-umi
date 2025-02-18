@extends('Partials.Frontpage')
@section('title', 'Berita')
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <article class="mb-5">
                        <img src="{{ asset('images/berita/' . $data->file) }}" alt="{{ $data->judul }}"
                            class="img-fluid rounded mb-3 w-100" loading="lazy">

                        <h2 class="fw-bold mb-3">{{ $data->judul }}</h2>

                        <div class="d-flex gap-3 text-secondary mb-3">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-user me-2"></i>
                                <span>{{ $data->penulis }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-calendar-days me-2"></i>
                                <span>{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-tag me-2"></i>
                                <span>{{ $data->kategori->nama }}</span>
                            </div>
                        </div>

                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style mb-4">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_whatsapp"></a>
                            <a class="a2a_button_threads"></a>
                            <a class="a2a_button_x"></a>
                            <a class="a2a_button_telegram"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->

                        <div class="content-body">
                            {!! $data->konten !!}
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <div style="top: 2rem;">
                        <h3 class="fw-bold mb-3">Berita lainnya</h3>
                        <hr class="mb-4">

                        @forelse ($all as $item)
                            <div class="card border-0 mb-4">
                                <div class="overflow-hidden rounded">
                                    <img src="{{ asset('images/berita/' . $item->file) }}" class="card-img-top img-fluid"
                                        alt="{{ $item->judul }}">
                                </div>
                                <div class="card-body px-0">
                                    <span class="badge bg-primary mb-2">{{ $item->kategori->nama }}</span>
                                    <h5 class="card-title">
                                        <a href="/read/{{ $item->id }}"
                                            class="text-decoration-none text-dark stretched-link">
                                            {{ $item->judul }}
                                        </a>
                                    </h5>
                                    <p class="card-text text-secondary">
                                        {{ $item->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Tidak ada berita lainnya</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
