@extends('Partials.AdminDashboard')
@section('title','Edit Foto')
@section('content')
<div class="container">
    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex">
          <h6 class="m-0 font-weight-bold text-primary">
            Edit Foto
          </h6>
        <a href="{{ route('gallery.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
            <span class="icon text-white-50">
                <i class="fa-solid fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        </div>
        <div class="card-body">
            <form action="{{ route('gallery.update',$find->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
              @csrf
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" required value="{{ $find->keterangan }}">
                  </div>
                  <div class="form-group">
                    <label for="file">Foto</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                  </div>
                  <div class="form-group">
                   <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
            </form>
        </div>
      </div>
@endsection