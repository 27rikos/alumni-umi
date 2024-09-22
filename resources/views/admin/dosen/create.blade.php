@extends('Partials.AdminDashboard')
@section('title', 'Dosen')
@section('content')
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="page-header d-print-none mb-5">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page Title and Breadcrumb Container -->
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Page Title -->
                            <h2 class="page-title mt-3">
                                Data Dosen
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dosen.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Dosen</li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Dosen</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('dosen.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('dosen.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nidn" class="form-label">NIDN</label>
                            <input type="text" class="form-control" id="nidn" name="nidn">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                        </div>
                        <div class="mb-3">
                            <label for="gelar" class="form-label">Gelar Akademik</label>
                            <textarea name="gelar" id="gelar" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="hp" class="form-label">No.Handphone</label>
                            <input type="text" class="form-control" id="hp" name="hp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
