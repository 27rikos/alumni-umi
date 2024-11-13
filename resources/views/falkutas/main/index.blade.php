@extends('Partials.falkutas')
@section('title', 'Alumni')
@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none mb-5">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page Title and Breadcrumb Container -->
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Page Title -->
                            <h2 class="page-title mt-3">
                                Data Alumni
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('alumni.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Alumni</li>
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
                    <div class="">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filter">
                            <i class="fa-solid fa-filter me-1"></i> Filter
                        </button>
                        <a href="{{ route('falkutas-excel') }}" class="btn btn-primary ">
                            <i class="fa-solid fa-file-excel me-2"></i> Export
                        </a>
                        {{-- <a href="{{ route('print-data') }}" class="btn btn-danger ">
                            <i class="fa-solid fa-file-pdf me-2"></i> PDF
                        </a> --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#zipModal">
                            <i class="fa-solid fa-images me-2"></i>Foto
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="zipModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-2" id="exampleModalLabel">Foto Wisudawan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('zip-download-fakultas') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="number" class="form-control" name="tahun"
                                                placeholder="Masukkan Tahun">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button class="btn btn-primary" type="submit">Download</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- end modal --}}
                        <a href="{{ route('falkutas.create') }}" class="btn btn-primary">
                            <i class="fa-solid fa-plus me-2"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="table-responsive m-3">
                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Alumni</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Stambuk</th>
                                <th>Status</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->no_alumni ?? '-' }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->npm }}</td>
                                    <td>{{ $item->stambuk }}</td>
                                    <td><span
                                            class="{{ $item->status == 1 ? 'text-teal bg-teal-lt' : 'text-danger bg-red-lt' }}  p-1  font-weight-bold rounded ">{{ $item->status == 1 ? 'Approved' : 'Pending' }}</span>
                                    </td>
                                    <td class="d-flex">
                                        <!-- Button trigger modal detail -->
                                        <button type="button" class="btn btn-primary" title="Detail" data-bs-toggle="modal"
                                            data-bs-target="#detail{{ $item->id }}">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                        <a href="{{ route('falkutas.edit', $item->id) }}" title="Edit"
                                            class="btn btn-primary mx-1">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <a href="falkutas/{{ $item->id }}/apv" title="Approve"
                                            class="btn btn-success me-1">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </a>
                                        <a href="falkutas/{{ $item->id }}/pending" title="Approve"
                                            class="btn btn-info me-1">
                                            <i class="fa-solid fa-xmark"></i>
                                        </a>

                                        <form action="{{ route('falkutas.destroy', $item->id) }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" title="Hapus">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="modal fade" id="filter" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Export Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('filter') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <select name="filteredby" id="" class="form-control mb-2">
                                            <option value="mejahijau">Meja Hijau</option>
                                            <option value="yudisium">Yudisium</option>
                                        </select>
                                        <div class="row">
                                            <div class="col">
                                                <input type="number" class="form-control" name="tahun"
                                                    placeholder="Tahun">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Export</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @foreach ($data as $item)
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="card">
                                        <div class="card-header">
                                            <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                                                <li class="nav-item">
                                                    <a href="#profile-{{ $item->id }}" class="nav-link active"
                                                        data-bs-toggle="tab">
                                                        <i class="fa-regular fa-user me-2"></i> Profil
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#history-{{ $item->id }}" class="nav-link"
                                                        data-bs-toggle="tab">
                                                        <i class="fa-solid fa-user-graduate me-2"></i> Riwayat Perkuliahan
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#file-{{ $item->id }}" class="nav-link"
                                                        data-bs-toggle="tab">
                                                        <i class="fa-solid fa-paperclip me-2"></i> Berkas
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <!-- Tab Profil -->
                                                <div class="tab-pane active show" id="profile-{{ $item->id }}">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center mb-3">
                                                            <img src="{{ asset('images/alumni/' . $item->file) }}"
                                                                alt="Foto Alumni" class="img-fluid rounded w-100 h-auto">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>NIK</th>
                                                                        <td>{{ $item->nik }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Nama</th>
                                                                        <td>{{ $item->nama }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Tempat Lahir</th>
                                                                        <td>{{ $item->tempat_lhr }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Tanggal Lahir</th>
                                                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_lhr)->translatedFormat('d F Y') }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Nama Ayah</th>
                                                                        <td>{{ $item->ayah }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Nama Ibu</th>
                                                                        <td>{{ $item->ibu }}</td>
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
                                                                        <th>Kecamatan</th>
                                                                        <td>{{ $item->kecamatan }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Kelurahan</th>
                                                                        <td>{{ $item->kelurahan }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tab Riwayat Perkuliahan -->
                                                <div class="tab-pane" id="history-{{ $item->id }}">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <th>No Alumni</th>
                                                                <td>{{ $item->no_alumni ?? '-' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>NPM</th>
                                                                <td>{{ $item->npm }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Program Studi</th>
                                                                <td>{{ $item->prodis->prodi }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Peminatan</th>
                                                                <td>{{ $item->minat->peminatan }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Fakultas</th>
                                                                <td>{{ $item->fakultas }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Stambuk</th>
                                                                <td>{{ $item->stambuk }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Seminar Proposal</th>
                                                                <td>{{ $item->sempro ? \Carbon\Carbon::parse($item->sempro)->translatedFormat('d F Y') : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Seminar Hasil</th>
                                                                <td>{{ $item->semhas ? \Carbon\Carbon::parse($item->semhas)->translatedFormat('d F Y') : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Sidang Meja Hijau</th>
                                                                <td>{{ $item->mejahijau ? \Carbon\Carbon::parse($item->mejahijau)->translatedFormat('d F Y') : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Yudisium</th>
                                                                <td>{{ $item->yudisium ? \Carbon\Carbon::parse($item->yudisium)->translatedFormat('d F Y') : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Judul Skripsi</th>
                                                                <td>{{ $item->judul }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Dosen Pembimbing 1</th>
                                                                <td>{{ $item->dosenpembimbing1->nama }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Dosen Pembimbing 2</th>
                                                                <td>{{ $item->dosenpembimbing2->nama }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Dosen Penguji 1</th>
                                                                <td>{{ $item->dosenpenguji1->nama }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Dosen Penguji 2</th>
                                                                <td>{{ $item->dosenpenguji2->nama }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>IPK</th>
                                                                <td>{{ $item->ipk ?? '-' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tahun Lulus</th>
                                                                <td>{{ $item->thn_lulus ?? '-' }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Tab Berkas -->
                                                <div class="tab-pane" id="file-{{ $item->id }}">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Ijazah</th>
                                                                <th>KTP</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">
                                                                    <img src="{{ asset('images/ijazah/' . $item->ijazah) }}"
                                                                        alt="Ijazah" class="img-fluid w-100 h-auto">
                                                                </td>
                                                                <td class="text-center">
                                                                    <img src="{{ asset('images/ktp/' . $item->ktp) }}"
                                                                        alt="KTP" class="img-fluid w-100 h-auto">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
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
