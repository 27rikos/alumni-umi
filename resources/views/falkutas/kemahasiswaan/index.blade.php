@extends('Partials.falkutas')
@section('title', 'Mahasiswa')

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
                                Data Mahasiswa
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('kemahasiswaan-fakultas.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex gap-2">
                    <a href="{{ route('kemahasiswaan-fakultas.create') }}" class="btn btn-outline-primary"><i
                            class="fa-solid fa-plus me-2"></i>Tambah</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#export">
                        <i class="fa-solid fa-file-export me-2"></i>Export
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="export" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-2" id="exampleModalLabel">Export Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('export-mahasiswa') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="number" class="form-control" name="tahun_masuk"
                                            placeholder="Contoh:2020">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Export</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#import">
                        <i class="fa-solid fa-file-import me-2"></i>Import
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-2" id="exampleModalLabel">Import Mahasiswa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('import_data_mahasiswa') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="file" name="file" accept=".xls,.xlsx,.csv" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive m-3">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Tahun Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->npm }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tahun_masuk }}</td>
                                    <td class="d-flex gap-2">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-azure" data-bs-toggle="modal"
                                            data-bs-target="#detail{{ $item->id }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <a href="{{ route('kemahasiswaan-fakultas.edit', $item->id) }}"
                                            class="btn btn-primary">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('kemahasiswaan-fakultas.destroy', $item->id) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($data as $item)
                        <!-- Modal -->
                        <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-2" id="exampleModalLabel">Detail Mahasiswa</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>NPM</th>
                                                    <td>{{ $item->npm }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>{{ $item->nama }}</td>
                                                </tr>
                                                <tr>
                                                    <th>NIK</th>
                                                    <td>{{ $item->nik ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Kelamin</th>
                                                    <td>{{ $item->gender }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tempat Lahir</th>
                                                    <td>{{ $item->tempat_lhr }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lahir</th>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_lhr)->translatedFormat('d F Y') ?? '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Provinsi</th>
                                                    <td>{{ $item->provinsi }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kota/Kabupaten</th>
                                                    <td>{{ $item->kota }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>{{ $item->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kode POS</th>
                                                    <td>{{ $item->pos ?? '-' }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Kewarganegaraan</th>
                                                    <td>{{ $item->kewarganegaraan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nomor HP</th>
                                                    <td>{{ $item->hp ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Telepon</th>
                                                    <td>{{ $item->telp ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Semester Masuk</th>
                                                    <td>{{ $item->masuk }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Masuk</th>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->translatedFormat('d F Y') ?? '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Program Studi</th>
                                                    <td>{{ $item->prodi_mahasiswa->prodi }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Fakultas</th>
                                                    <td>{{ $item->fakultas }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tahun Masuk</th>
                                                    <td>{{ $item->tahun_masuk }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kelas</th>
                                                    <td>{{ $item->kelas }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Asal Sekolah</th>
                                                    <td>{{ $item->asal }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kategori</th>
                                                    <td>{{ $item->kategori ?? '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
