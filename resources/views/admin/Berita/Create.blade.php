@extends('Partials.AdminDashboard')
@section('title','Tambah Berita')
@section('content')
<div class="container">
    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex">
          <h6 class="m-0 font-weight-bold text-primary">
            Tambah Berita
          </h6>
        <a href="{{ route('berita.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
            <span class="icon text-white-50">
                <i class="fa-solid fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        </div>
        <div class="card-body">
            <form action="{{ route('berita.store') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label for="judul">Judul Berita</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                  </div>
                  <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" required> 
                  </div>
                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required> 
                  </div>
                  <div class="form-group">
                    <label for="x">Konten</label>
                    <input id="x" type="hidden" name="konten">
                    <trix-editor input="x"></trix-editor> 
                  </div>
                  <div class="form-group">
                    <label for="file">Foto </label>
                    <input type="file" class="form-control-file" id="file" name="file" required>
                  </div>
                  <div class="form-group">
                   <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
            </form>
        </div>
      </div>
@endsection

