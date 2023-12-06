@extends('Partials.FrontPage')
@section('title','Video')
@section('content')
    <div class="container mt-3">
        <div class="row">
          
            @forelse ($data as $item)
  
            <div class="col-lg-3 col-md-4 col-xs-6">
              <a   data-fancybox="gallery" href="{{ $item->link }}" class="d-block mb-4 h-100" style="text-decoration: none">
                    <img class="img-fluid img-thumbnail object-fit-cover shadow" src="{{ asset('storage/video/'.$item->file) }}" id="foto">
                    <small>{{ $item->judul }}</small>
                  </a>
            </div>
            @empty
            <div class="alert alert-info mt-3 text-center" role="alert">
           Gallery Kosong
            </div>
            @endforelse 
          </div>
    </div>
@endsection