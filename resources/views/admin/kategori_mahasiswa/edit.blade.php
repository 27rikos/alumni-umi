@extends('Partials.AdminDashboard')
@section('title', 'Edit Kategori Mahasiswa')
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
                                Data Kategori Mahasiswa
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('peminatan.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Kategori Mahasiswa</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Kategori Mahasiswa</li>
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
                    <a href="{{ route('kategori_mahasiswa.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori_mahasiswa.update', $data->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="kategori" class="form-label">Kategori Mahasiswa</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" required
                                value="{{ $data->kategori }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
