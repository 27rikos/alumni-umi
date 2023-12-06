@extends('Partials.frontpage')
@section('title','Pencarian')
@section('content')

<div class="cari container text-center">


<div class="alert alert-primary mt-5" role="alert">
    Silahkan Masukkan <strong>Nama/NPM/Stambuk</strong> Sebagai Kata Kunci
  </div>
<form class="d-flex" role="search" method="GET" action="/pencarian/data" >
    <input class="form-control me-2"name="cari" type="search" placeholder="Cari alumni" aria-label="Search" value="{{ request('cari') }}">
    <button class="btn btn-primary" id="cari" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
  </form>



</div>
<div class="container mt-5 mb-4 ">
   <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
    @forelse ($datas as $item)
        <div class="col">
            <div class="d-flex justify-content-center">
                <div class="card mb-3 text-center shadow" style="width: 18rem;height:30rem">
                    <div class="card-header">
                       <h6 class="mt-2"> {{ $item->npm }}</h6>
                       <p><small>{{ $item->stambuk }}</small></p>
                    </div>
                    <div class="card-body">
                     <img src="{{ asset('storage/alumni_foto/'.$item->file) }}" alt=".." id="profile" class="rounded-circle" style="width:200px;height:200px">
                    <div class="mt-3">
                        <h5>  {{ $item->nama }}</h5>
                        <div class="card-footer">
                            <small>
                                {{ $item->prodis->prodi }} <br>
                                {{ $item->minat->peminatan }}
                            </small>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    <div class="alert alert-info mt-5 text-center" role="alert">
        Data Belum Tersedia
       </div>
    @endforelse
</div>
{{ $datas->links('pagination::bootstrap-5') }}
</div>
@endsection