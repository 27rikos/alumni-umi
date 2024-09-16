@extends('Partials.AdminDashboard')
@section('title', 'berita')
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
                                Berita
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Berita</li>
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
                    <a href="{{ route('berita.create') }}" class="btn btn-primary me-2"><i
                            class="fa-solid fa-plus me-2"></i>Tambah</a>
                    <a href="{{ route('berita.index') }}" class="btn btn-azure"> <i class="fa fa-refresh me-2"></i>
                        Refresh</a>
                </div>
                <div class="table-responsive m-3">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>Konten</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->penulis }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td style="text-align: justify">{!! $item->konten !!}</td>
                                    <td>
                                        <img src="{{ asset('images/berita/' . $item->file) }}" alt="Foto Berita"
                                            class="img-fluid" style="width: 100%; height:100%">
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-primary me-2"
                                            role="button">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('berita.destroy', $item->id) }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit" role="button">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
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
