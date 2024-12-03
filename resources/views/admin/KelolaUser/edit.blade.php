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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
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
                    <form action="{{ route('kelolauser.update', $data->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name"class="form-label">Username</label>
                            <input type="text" class="form-control" id="name" name="name"required
                                value="{{ $data->name }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email"class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                value="{{ $data->email }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="falkutas" class="form-label">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">Pilih</option>
                                @foreach (['admin' => 'Super Admin', 'fakultas' => 'Admin Fakultas'] as $value => $label)
                                    <option value="{{ $value }}" {{ $data->role == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="fakultas" class="form-label">Admin Fakultas (Untuk Role Admin Fakultas)</label>
                            <select name="fakultas" id="fakultas" class="form-control">
                                <option value="">Pilih Fakultas</option>
                                @foreach (['Fakultas Ilmu Komputer', 'Fakultas Kedokteran', 'Fakultas Sastra', 'Fakultas Ekonomi', 'Fakultas Pertanian'] as $option)
                                    <option value="{{ $option }}" {{ $data->fakultas == $option ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="prodi" class="form-label">Prodi</label>
                            <select name="prodi" id="prodi" class="form-select">
                                <option value="">Pilih Prodi</option>
                                @foreach ($prodi as $item)
                                    <option
                                        value="{{ $item->prodi }}"{{ $item->prodi == $data->prodi ? 'selected' : '' }}>
                                        {{ $item->prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
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
            function toggleFakultasDropdown() {
                var selectedRole = $('#role').val();
                if (selectedRole === "admin") {
                    $('#fakultas').prop('disabled', true); // Disable Fakultas dropdown
                    $('#prodi').prop('disabled', true); // Disable Prodi dropdown
                } else {
                    $('#fakultas').prop('disabled', false); // Enable Fakultas dropdown
                    $('#prodi').prop('disabled', false); // Enable Prodi dropdown
                }
            }

            // Initial state check
            toggleFakultasDropdown();

            // On role change
            $('#role').change(function() {
                toggleFakultasDropdown();
            });
        });
    </script>
@endpush
