@extends('Partials.Frontpage')
@section('title','content')
@section('content')
<section class="min-vh-100">
    <div class="container mt-4">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
              <li class="breadcrumb-item"><a href="/view/berita">Berita</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $data->judul }}</li>
            </ol>
          </nav>
          <h1 class="mb-2">{{ $data->judul }}</h1>
          <p class="text-secondary"> <small>{{ $data->tanggal }}</small> /
        <small>{{ $data->penulis }}</small>
        </p>
           <div class="text-center">
            <img src="{{asset('storage/berita/'.$data->file)}}" alt="Dokumentasi" style="width: 100%" id="view">
           </div>
          <article style="text-align: justify" class="mt-3 mb-3"> {!! $data->konten !!}</article>
    </div>
  </section>
@endsection