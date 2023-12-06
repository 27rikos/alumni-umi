@extends('Partials.AdminDashboard')
@section('title','Edit Video')
@section('content')
<div class="container">
    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex">
          <h6 class="m-0 font-weight-bold text-primary">
            Edit Video
          </h6>
        <a href="{{ route('Video.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
            <span class="icon text-white-50">
                <i class="fa-solid fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        </div>
        <div class="card-body">
            <form action="{{ route('Video.update',$find->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
              @csrf
                <div class="form-group">
                    <label for="judul">Judul Video</label>
                    <input type="text" class="form-control" id="judul" name="judul" required value="{{ $find->judul }}">
                  </div>
                  <div class="form-group">
                    <label for="link">Link Video</label>
                    <input type="text" class="form-control" id="link" name="link" required  value="{{ $find->link }}">
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