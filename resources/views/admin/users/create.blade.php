@extends('Partials.AdminDashboard')
@section('title', 'Kelola User Alumni')
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
                                Data User Alumni
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('kelolauser.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola User Alumni</li>
                                    <li class="breadcrumb-item active" aria-current="page">Create User Alumni</li>
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
                    <a href="{{ route('enduser.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('enduser.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" id="name" name="name"required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="npm">NPM</label>
                            <input type="text" class="form-control" id="npm" name="npm"required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
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
