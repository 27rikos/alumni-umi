@extends('Partials.AdminDashboard')
@section('title', 'Jenis Kerjasama')
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
                                Jenis Kerjasama
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('cooperation-type.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Jenis Kerjasama</li>
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
                    <a href="{{ route('cooperation-type.create') }}" class="btn btn-primary me-2"><i
                            class="fa-solid fa-plus me-2"></i>Tambah</a>
                    <a href="{{ route('cooperation-type.index') }}" class="btn btn-azure"> <i
                            class="fa fa-refresh me-2"></i>
                        Refresh</a>
                </div>
                <div class="table-responsive m-3">
                    <table class="table table-bordered" id="example" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Kerjasama</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->jenis_kerjasama }}</td>
                                    <td>{!! $item->deskripsi !!}</td>
                                    <td class=" d-flex ">
                                        <a href="{{ route('cooperation-type.edit', $item->id) }}"
                                            class="btn btn-primary me-2 "><i class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('cooperation-type.destroy', $item->id) }}" method="post">
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
