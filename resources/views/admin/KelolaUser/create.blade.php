@extends('Partials.AdminDashboard')
@section('title', 'Kelola Admin')
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
                                Data Admin
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('kelolauser.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Admin</li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Admin</li>
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
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control" id="name" name="name"required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email"class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="fakultas"class="form-label">Role</label>
                            <select name="role" id="" class="form-control">
                                <option value="">Pilih Role</option>
                                <option value="admin">Super Admin</option>
                                <option value="fakultas">Admin Fakultas</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="fakultas"class="form-label">Admin Fakultas (Untuk Role Admin Fakultas)</label>
                            <select name="fakultas" id="fakultas" class="form-select">
                                <option value="">Pilih Fakultas</option>
                                <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                                <option value="Fakultas Sastra">Fakultas Sastra</option>
                                <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                                <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="prodi" class="form-label">Prodi</label>
                            <select name="prodi" id="prodi" class="form-select">
                                <option value="">Pilih Prodi</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->prodi }}">{{ $item->prodi }}</option>
                                @endforeach
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
@push('script')
    <script>
        $(document).ready(function() {
            // Trigger event on role select change
            $('select[name="role"]').change(function() {
                var selectedRole = $(this).val();

                if (selectedRole === "admin") {
                    // Disable Fakultas selectbox
                    $('#fakultas').prop('disabled', true);
                    $('#prodi').prop('disabled', true);
                } else {
                    // Enable Fakultas selectbox
                    $('#fakultas').prop('disabled', false);
                    $('#prodi').prop('disabled', false);
                }
            });
        });
    </script>
@endpush
