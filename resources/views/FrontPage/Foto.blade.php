@extends('Partials.Frontpage')
@section('title', 'Foto')
@section('content')
    <section class="min-vh-100 pt-5">
        <div class="jumbotron jumbotron-fluid"
            style="background: linear-gradient(135deg, #4a90e2, #0052cc); color: white; padding: 50px 0;">
            <div class="container">
                <h1 class="display-4 font-weight-bold" style="font-size: 3rem;">Gallery Foto</h1>
                <p class="lead">Koleksi foto kegiatan alumni yang penuh kenangan dan semangat.</p>
                <nav aria-label="breadcrumb" class="d-flex mt-4">
                    <ol class="breadcrumb bg-transparent p-0">
                        <li class="breadcrumb-item"><a href="{{ route('main') }}" class="text-light">Home</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page">Foto Kegiatan Alumni</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @forelse ($data as $item)
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0">
                        <div class="image">
                            <img src="{{ asset('images/foto/' . $item->file) }}" loading="lazy" alt="">
                            <div class="overlay">
                                <a data-fancybox="gallery" class="h4"
                                    href="{{ asset('images/foto/' . $item->file) }}">{{ $item->keterangan }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-primary w-100 text-center" role="alert">
                        Foto Belum Di Update
                    </div>
                @endforelse

            </div>
        </div>


    </section>
@endsection
@push('foto')
    <link rel="stylesheet" href="{{ asset('foto.css') }}">
@endpush
