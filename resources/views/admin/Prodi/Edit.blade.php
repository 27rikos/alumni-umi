@extends('Partials.AdminDashboard')
@section('title', 'Edit Prodi')
@section('content')
    <div class="main">
        <div class="card shadow mb-4 my-2 my-3">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Edit Program Studi
                </h6>
                <a href="{{ route('prodi.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('prodi.update', $prodi->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="kd_prodi">Kode Program Studi</label>
                        <input type="text" class="form-control" id="kd_prodi" name="kd_prodi"
                            value="{{ $prodi->kd_prodi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" value="{{ $prodi->prodi }}"
                            value="">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
