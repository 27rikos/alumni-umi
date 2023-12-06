@extends('Partials.FrontPage')
@section('title','Foto')
@section('content')
    <div class="container mt-3">
        <div class="row">
          
            @forelse ($data as $item)
  
            <div class="col-lg-3 col-md-4 col-xs-6">
              <a   data-fancybox="gallery" href="{{ asset('storage/gallery/'.$item->file) }}" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail p-2" src="{{ asset('storage/gallery/'.$item->file) }}" id="foto" style="height:200px;width:300px">
                    
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