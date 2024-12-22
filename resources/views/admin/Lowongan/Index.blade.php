@extends('Partials.AdminDashboard')
@section('title', 'Lowongan')
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
                                Lowongan Kerja
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('jobfair.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Lowongan Kerja</li>
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
                    <a href="{{ route('jobfair.create') }}" class="btn btn-outline-primary me-2"><i
                            class="fa-solid fa-plus me-2"></i>Tambah</a>
                </div>
                <div class="table-responsive m-3">
                    <table class="table table-bordered" id="example" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->npm ?? '-' }}</td>
                                    <td class=" d-flex gap-2 ">
                                        <a href="#" class="btn btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#detail{{ $item->id }}" title="Detail"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('jobfair.edit', $item->id) }}" class="btn btn-primary "><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('jobfair.destroy', $item->id) }}" method="post">
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
    @foreach ($data as $item)
        <!-- Modal -->
        <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-2" id="exampleModalLabel">Detail Lowongan Kerja</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex gap-5">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                                <tr>
                                    <th>NPM</th>
                                    <td>{{ $item->npm ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Posisi</th>
                                    <td>{{ $item->posisi }}</td>
                                </tr>
                                <tr>
                                    <th>Perusahaan</th>
                                    <td>{{ $item->perusahaan }}</td>
                                </tr>
                                <tr>
                                    <th>Gaji</th>
                                    <td>{{ $item->gaji }}</td>
                                </tr>
                                <tr>
                                    <th>Kontak</th>
                                    <td>{{ $item->kontak }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $item->email }}</td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Kualfikasi</th>
                                    <td>
                                        {!! $item->kualifikasi !!}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
