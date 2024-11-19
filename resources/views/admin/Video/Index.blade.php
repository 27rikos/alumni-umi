@extends('Partials.AdminDashboard')
@section('title', 'Video')

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
                                Data Video
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('Video.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Video</li>
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
                    <a href="{{ route('Video.create') }}" class="btn btn-outline-primary me-2"><i
                            class="fa-solid fa-plus me-2"></i>Tambah</a>
                </div>
                <div class="table-responsive m-3">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Video</th>
                                <th>Link Video</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($videos as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td><a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></td>
                                    <td>
                                        <img src="{{ asset('images/thumbnail/' . $item->file) }}" alt="Thumbnail"
                                            style="width:4cm; height:3cm;">
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('Video.edit', $item->id) }}" class="btn btn-primary mx-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('Video.destroy', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fa-solid fa-trash-can"></i>
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
