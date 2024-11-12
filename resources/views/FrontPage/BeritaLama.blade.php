@extends('Partials.Frontpage')
@section('title', 'Berita Terkait')
@section('content')
    <section class="min-vh-100 pt-5">
        <div class="jumbotron jumbotron-fluid"
            style="background: linear-gradient(135deg, #4a90e2, #0052cc); color: white; padding: 50px 0;">
            <div class="container">
                <h1 class="display-4 font-weight-bold" style="font-size: 3rem;">Berita</h1>
                <p class="lead">Dapatkan informasi terbaru dan berita menarik.</p>
                <nav aria-label="breadcrumb" class="d-flex  mt-4">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ route('main') }}" class="text-light">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page" class="text-light">Berita Lainnya</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container ">
            <div class="row my-3">
                @forelse ($datas as $item)
                    <div data-aos="fade-right">
                        <div class="col-md-12">
                            <div class="row mb-2">
                                <div class="col-md-3 ">
                                    <img src="{{ asset('images/berita/' . $item->file) }}" alt="Dokumentasi"
                                        class="img-fluid rounded" loading="lazy">
                                </div>

                                <div class="col-md-9">
                                    <a href="/read/{{ $item->id }}" style="text-decoration:none">{{ $item->judul }}</a>
                                    <p class="text-secondary">{{ $item->created_at->diffForHumans() }}
                                    </p>
                                    <p class="limit text-justify">
                                        {{ Str::limit(Strip_tags($item['konten']), 100, '.....') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="alert alert-info mt-5 text-center w-100" role="alert">
                            Berita belum tersedia
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
