@extends('Partials.AdminDashboard')
@section('title','Tambah Peminatan')
@section('content')
<div class="container">
    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex">
          <h6 class="m-0 font-weight-bold text-primary">
            Tambah Peminatan
          </h6>
        <a href="{{ route('peminatan.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
            <span class="icon text-white-50">
                <i class="fa-solid fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
        </div>
        <div class="card-body">
            <form action="{{ route('peminatan.store') }}" method="post">
              @csrf
                <div class="form-group">
                    <label for="kd_peminatan">Kode Peminatan</label>
                    <input type="text" class="form-control" id="kd_peminatan" name="kd_peminatan" required>
                  </div>
                  <div class="form-group">
                    <label for="peminatan">Peminatan</label>
                    <input type="text" class="form-control" id="peminatan" name="peminatan" required>
                  </div>
                  <div class="form-group">
                   <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
            </form>
        </div>
      </div>
@endsection