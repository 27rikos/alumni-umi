@extends('Partials.AdminDashboard')
@section('title', 'Kategori Berita')
@section('content')
    <div class="container-xl min-vh-100">
        <div class="page-header d-print-none mb-5">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page Title and Breadcrumb Container -->
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Page Title -->
                            <h2 class="page-title mt-3">
                                Kategori Berita
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('cooperation-type.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Kategori Berita</li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Kategori Berita</li>
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
                    <a href="{{ route('kategori-berita.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori-berita.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="nama" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama"required>
                        </div>
                        <div class="form-group mb-2 mt-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
