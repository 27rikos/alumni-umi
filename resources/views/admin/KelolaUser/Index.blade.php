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
                    <a href="{{ route('kelolauser.create') }}" class="btn btn-outline-primary me-2"><i
                            class="fa-solid fa-plus me-2"></i>Tambah</a>
                </div>
                <div class="table-responsive m-3">
                    <table class="table table-bordered" id="example" width="100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->role == 'admin')
                                            Super Admin
                                        @else
                                            Admin
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->fakultas == null)
                                            Access for all
                                        @else
                                            {{ $item->fakultas }}
                                        @endif
                                    </td>
                                    <td class=" d-flex ">
                                        <a href="{{ route('kelolauser.edit', $item->id) }}" class="btn btn-primary me-2 "><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('kelolauser.destroy', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fa-regular fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
