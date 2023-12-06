@extends('Partials.AdminDashboard')
@section('title','Tambah Prodi')
@section('content')
<div class="container">
    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex">
          <h6 class="m-0 font-weight-bold text-primary">
            Tambah Program Studi
          </h6>
        <a href="{{ route('prodi.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
            <span class="icon text-white-50">
                <i class="fa-solid fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        </div>
        <div class="card-body">
            <form action="{{ route('prodi.store') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label for="kd_prodi">Kode Program Studi</label>
                    <input type="text" class="form-control" id="kd_prodi" name="kd_prodi" required>
                  </div>
                  <div class="form-group">
                    <label for="prodi">Program Studi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" required> 
                  </div>
                  <div class="form-group">
                   <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
            </form>
        </div>
      </div>
@endsection