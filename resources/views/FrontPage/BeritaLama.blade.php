@extends('Partials.FrontPage')
@section('title','Berita Terkait')
@section('content')
<section class="min-vh-100">
    <div class="container mt-4">
      <nav aria-label="breadcrumb ">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Berita</li>
          </ol>
        </nav>
      <div class="data">
          
          @forelse ($datas as $item)
         <div class="card mt-3 shadow">
          <div class="row mb-2 p-3">
            <div class="col-md-3">
                <img src="{{asset('storage/berita/'.$item->file)}}" alt="Dokumentasi" id="view" class="rounded  object-fit-cover" style="width:250px ;height:150px">
            </div>
            <div class="col-md-9">
                <a href="/view/{{ $item->id }}/berita" style="text-decoration:none">{{ $item->judul }}</a>
                <p class="text-secondary"><i class="fa-regular fa-calendar-days fa-sm me-3"></i>{{ $item->tanggal }}</p>
                <p class="limit text-justify">{{ Str::limit(Strip_tags($item['konten']), 100,".....") }}</p>
            </div>
          </div>
         </div>
          
          @empty
          <div class="alert alert-info mt-5 text-center" role="alert">
              Berita belum tersedia
             </div>
          @endforelse
      </div>
    </div>
  </section>
@endsection