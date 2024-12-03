@extends('Partials.AdminDashboard')
@section('title', 'edit Peminatan')
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
                                Data Peminatan
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('peminatan.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Peminatan</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Peminatan</li>
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
                    <a href="{{ route('peminatan.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('peminatan.update', $find->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group mb-2">
                            <label for="kd_peminatan">Kode Peminatan</label>
                            <input type="text" class="form-control" id="kd_peminatan" name="kd_peminatan"
                                value="{{ $find->kd_peminatan }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="peminatan" class="form-label">Peminatan</label>
                            <input type="text" class="form-control" id="peminatan" name="peminatan"
                                value="{{ $find->peminatan }}">
                        </div>
                        <div class="form-group mb-2" class="form-label">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
