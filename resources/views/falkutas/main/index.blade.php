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
                        <button type="button" class="btn btn-azure" data-bs-toggle="modal" data-bs-target="#filter">
                            <i class="fa-solid fa-filter me-1"></i> Filter
                        </button>
                        <a href="{{ route('falkutas-excel') }}" class="btn btn-warning ">
                            <i class="fa-solid fa-file-excel me-2"></i> Export
                        </a>
                        {{-- <a href="{{ route('print-data') }}" class="btn btn-danger ">
                            <i class="fa-solid fa-file-pdf me-2"></i> PDF
                        </a> --}}

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
                                                <input type="date" class="form-control" name="start"
                                                    placeholder="Start date">
                                            </div>
                                            <div class="col">
                                                <input type="date" class="form-control" name="end"
                                                    placeholder="End date">
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
                        <!-- Modal detail-->
                        <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-centered  ">
                                <div class="modal-content">
                                    <div class="card">
                                        <div class="card-header">
                                            <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                                                <li class="nav-item">
                                                    <a href="#profile-{{ $item->id }}" class="nav-link active"
                                                        data-bs-toggle="tab">
                                                        <i class="fa-regular fa-user me-2"></i>
                                                        Profile</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#history-{{ $item->id }}" class="nav-link"
                                                        data-bs-toggle="tab">
                                                        <i class="fa-solid fa-user-graduate me-2"></i>
                                                        History Perkuliahan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#file-{{ $item->id }}" class="nav-link"
                                                        data-bs-toggle="tab">
                                                        <i class="fa-solid fa-paperclip me-2"></i>
                                                        Berkas</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="profile-{{ $item->id }}">
                                                    <div class="row">
                                                        <!-- Image Column -->
                                                        <div class="col-md-4 col-sm-12 text-center mb-3">
                                                            <img src="{{ asset('images/alumni/' . $item->file) }}"
                                                                alt="Alumni Photo" class="img-fluid rounded"
                                                                style="max-width: 100%; height: auto;">
                                                        </div>

                                                        <!-- Table Column -->
                                                        <div class="col-md-8 col-sm-12">
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">NIK</th>
                                                                        <td>{{ $item->nik }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Nama</th>
                                                                        <td>{{ $item->nama }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Tempat Lahir</th>
                                                                        <td>{{ $item->tempat_lhr }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        @php
                                                                            $dateString = $item->tanggal_lhr;
                                                                            $tanggal_lhr = strftime(
                                                                                '%d %B %Y',
                                                                                strtotime($dateString),
                                                                            );
                                                                        @endphp
                                                                        <th scope="row">Tanggal Lahir</th>
                                                                        <td>{{ $tanggal_lhr }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Nama Ayah</th>
                                                                        <td>{{ $item->ayah }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Nama Ibu</th>
                                                                        <td>{{ $item->ibu }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Alamat</th>
                                                                        <td>{{ $item->alamat }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="history-{{ $item->id }}">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">No Alumni</th>
                                                                <td>{{ $item->no_alumni }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">NPM</th>
                                                                <td>{{ $item->npm }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Program Studi</th>
                                                                <td>{{ $item->prodis->prodi }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Peminatan</th>
                                                                <td>{{ $item->minat->peminatan }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Fakultas</th>
                                                                <td>{{ $item->fakultas }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Stambuk</th>
                                                                <td>{{ $item->stambuk }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Seminar Proposal</th>
                                                                @php
                                                                    $dateString = $item->sempro;
                                                                    $sempro = strftime(
                                                                        '%d %B %Y',
                                                                        strtotime($dateString),
                                                                    );
                                                                @endphp
                                                                <td>{{ $sempro }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Seminar Hasil</th>
                                                                @php
                                                                    $dateString = $item->semhas;
                                                                    $semhas = strftime(
                                                                        '%d %B %Y',
                                                                        strtotime($dateString),
                                                                    );
                                                                @endphp
                                                                <td>{{ $semhas }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Sidang Meja Hijau</th>
                                                                @php
                                                                    $dateString = $item->mejahijau;
                                                                    $sidang = strftime(
                                                                        '%d %B %Y',
                                                                        strtotime($dateString),
                                                                    );
                                                                @endphp
                                                                <td>{{ $sidang }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Yudisium</th>
                                                                @php
                                                                    $dateString = $item->yudisium;
                                                                    $yudisium = strftime(
                                                                        '%d %B %Y',
                                                                        strtotime($dateString),
                                                                    );
                                                                @endphp
                                                                <td>{{ $yudisium }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Judul Skripsi</th>
                                                                <td>{{ $item->judul }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Dosen Penguji 1</th>
                                                                <td>{{ $item->penguji1 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Dosen Penguji 2</th>
                                                                <td>{{ $item->penguji2 }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">IPK</th>
                                                                <td>{{ $item->ipk }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Tahun Lulus</th>
                                                                <td>{{ $item->thn_lulus }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane" id="file-{{ $item->id }}">
                                                    <div class="tab-pane active show" id="file-{{ $item->id }}">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Ijazah</th>
                                                                    <th scope="col">KTP</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center">
                                                                        <img src="{{ asset('images/ijazah/' . $item->ijazah) }}"
                                                                            alt="Ijazah" class="img-fluid"
                                                                            style="max-width: 100%; height: auto;">
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <img src="{{ asset('images/ktp/' . $item->ktp) }}"
                                                                            alt="KTP" class="img-fluid"
                                                                            style="max-width: 100%; height: auto;">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
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
