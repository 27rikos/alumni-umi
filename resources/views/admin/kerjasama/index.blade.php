@extends('Partials.AdminDashboard')
@section('title', 'Kerjasama')
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
                                Kerjasama
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('cooperation.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Kerjasama</li>
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
                    <a href="{{ route('cooperation.create') }}" class="btn btn-primary me-2"><i
                            class="fa-solid fa-plus me-2"></i>Tambah</a>
                    <a href="{{ route('cooperation.index') }}" class="btn btn-azure"> <i class="fa fa-refresh me-2"></i>
                        Refresh</a>
                </div>
                <div class="table-responsive m-3">
                    <table class="table table-bordered" id="example" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Institusi</th>
                                <th>Jenis Kerjasama</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->instansi }}</td>
                                    <td>{{ $item->kerjasama?->jenis_kerjasama }}</td>
                                    <td><span
                                            class=" {{ $item->status == 'aktif' ? 'text-teal bg-teal-lt' : '' }} {{ $item->status == 'nonaktif' ? 'text-secondary bg-secondary-lt' : '' }} {{ $item->status == 'selesai' ? 'text-primary bg-primary-lt' : '' }} px-2 py-1 rounded">{{ $item->status }}</span>
                                    </td>
                                    <td class=" d-flex gap-2 ">
                                        <a href="#" class="btn btn-dark" title="Detail"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a href="#" class="btn btn-teal" title="Aktif"><i
                                                class="fa-solid fa-check"></i></a>
                                        <a href="#" class="btn btn-secondary" title="Nonaktif"><i
                                                class="fa-solid fa-xmark"></i></a>
                                        <a href="#" class="btn btn-azure" title="Selesai"><i
                                                class="fa-solid fa-check-double"></i></a>
                                        <a href="{{ route('kelolauser.edit', $item->id) }}" class="btn btn-primary "><i
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
