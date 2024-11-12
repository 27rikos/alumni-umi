@extends('Partials.Frontpage')
@section('title', 'Video')
@section('content')
    <section class="min-vh-100 pt-5">
        <div class="jumbotron jumbotron-fluid"
            style="background: linear-gradient(135deg, #4a90e2, #0052cc); color: white; padding: 50px 0;">
            <div class="container">
                <h1 class="display-4 font-weight-bold" style="font-size: 3rem;">Gallery Video</h1>
                <p class="lead">Dapatkan informasi video kegiatan alumni terbaru.</p>
                <nav aria-label="breadcrumb" class="d-flex mt-4">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ route('main') }}" class="text-light">Home</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page">Video Kegiatan Alumni</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                @forelse ($data as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card shadow" style="height: 18rem">
                            <img src="{{ asset('images/thumbnail/' . $item->file) }}" class="card-img-top object-fit-cover"
                                alt="{{ $item->judul }}">
                            <div class="card-body">
                                <a data-fancybox="gallery" href="http://{{ $item->link }}">{{ $item->judul }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info mt-3 text-center w-100" role="alert">
                        Gallery Kosong
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
