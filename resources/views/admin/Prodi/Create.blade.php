@extends('Partials.AdminDashboard')
@section('title', 'Tambah Prodi')
@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none mb-5">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page Title and Breadcrumb Container -->
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Page Title -->
                            <h2 class="page-title mt-3">
                                Data Program Studi
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('prodi.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Program Studi</li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Program Studi</li>
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
                    <a href="{{ route('prodi.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('prodi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="kd_prodi">Kode Program Studi</label>
                            <input type="text" class="form-control" id="kd_prodi" name="kd_prodi" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="prodi">Program Studi</label>
                            <input type="text" class="form-control" id="prodi" name="prodi" required>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
