@extends('Partials.AdminDashboard')
@section('title', 'Tambah User')
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
                                Data User
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('kelolauser.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola User</li>
                                    <li class="breadcrumb-item active" aria-current="page">Create User</li>
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
                    <a href="{{ route('kelolauser.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelolauser.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" id="name" name="name"required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="fakultas">Admin Fakultas (Untuk Role Admin Fakultas)</label>
                            <select name="fakultas" id="fakultas" class="form-control">
                                <option value="">Pilih Fakultas</option>
                                <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                                <option value="Fakultas Sastra">Fakultas Sastra</option>
                                <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                                <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="fakultas">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="">Pilih Role</option>
                                <option value="fakultas">Admin Fakultas</option>
                                <option value="admin">Super Admin</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"required>
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
