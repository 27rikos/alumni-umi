@extends('Partials.FrontPage')
@section('title', 'Foto')
@push('foto')
    <link rel="stylesheet" href="{{ asset('foto.css') }}">
@endpush
@section('content')
    <section class="min-vh-100">
        <div class="jumbotron jumbotron-fluid mt-5">
            <div class="container">
                <h1 class="display-4">Gallery Foto</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Foto Kegiatan Alumni</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @forelse ($data as $item)
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0">
                        <div class="image">
                            <img src="{{ asset('images/foto/' . $item->file) }}" alt="">
                            <div class="overlay">
                                <a data-fancybox="gallery" class="h4"
                                    href="{{ asset('images/foto/' . $item->file) }}">{{ $item->keterangan }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info" role="alert">
                        Foto Belum Di Update
                    </div>
                @endforelse

            </div>
        </div>


    </section>
@endsection
