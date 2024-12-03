@extends('Partials.falkutas')
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
                    <a href="{{ route('kerjasama-fakultas.create') }}" class="btn btn-outline-primary me-2"><i
                            class="fa-solid fa-plus me-2"></i>Tambah</a>
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
                                        <a href="#" class="btn btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#detail{{ $item->id }}" title="Detail"><i
                                                class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('kerjasama-active', ['id' => $item->id]) }}" class="btn btn-teal"
                                            title="Aktif"><i class="fa-solid fa-check"></i></a>
                                        <a href="{{ route('kerjasama-nonaktif', ['id' => $item->id]) }}"
                                            class="btn btn-secondary" title="Nonaktif"><i class="fa-solid fa-xmark"></i></a>
                                        <a href="{{ route('kerjasama-selesai', ['id' => $item->id]) }}"
                                            class="btn btn-azure" title="Selesai"><i
                                                class="fa-solid fa-check-double"></i></a>
                                        <a href="{{ route('cooperation.edit', $item->id) }}" class="btn btn-primary "><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="{{ route('cooperation.destroy', $item->id) }}" method="post">
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
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-2" id="exampleModalLabel">Detail Kerjasama</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex gap-5">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Nama Instansi</th>
                                    <td>{{ $item->instansi }}</td>
                                </tr>
                                <tr>
                                    <th>Waktu Pelaksanaan</th>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') }}
                                        <span>-</span>
                                        {{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jenis Kerjasama</th>
                                    <td>{{ $item->kerjasama?->jenis_kerjasama }}</td>
                                </tr>
                                <tr>
                                    <th>Status Kerjasama</th>
                                    <td><span
                                            class=" {{ $item->status == 'aktif' ? 'text-teal bg-teal-lt' : '' }} {{ $item->status == 'nonaktif' ? 'text-secondary bg-secondary-lt' : '' }} {{ $item->status == 'selesai' ? 'text-primary bg-primary-lt' : '' }} px-2 py-1 rounded">{{ $item->status }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Dokumen Kerjasama</th>
                                    <td><a href="{{ asset('dokumen/kerjasama/' . $item->file) }}"
                                            download="{{ $item->file }}" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-download me-2"></i>File</a></td>
                                </tr>
                            </table>
                            <table>
                                <td>
                                    <img src="{{ asset('images/logo_instansi/' . $item->foto) }}" alt="Logo Instansi"
                                        class="img-fluid" style="max-width: 150px; height: auto;">
                                </td>
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
