@extends('Partials.FrontPage')
@section('title', 'Berita Terkait')
@section('content')
    <section class="min-vh-100 pt-5">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Berita</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita Lainnya</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container ">
            <div class="row my-3">
                @forelse ($datas as $item)
                    <div class="col-md-12">
                        <div class="row mb-2">
                            <div class="col-md-3 ">
                                <img src="{{ asset('images/berita/' . $item->file) }}" alt="Dokumentasi"
                                    class="img-fluid rounded">
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
                @empty
                    <div class="col-md-12">
                        <div class="alert alert-info mt-5 text-center" role="alert">
                            Berita belum tersedia
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
