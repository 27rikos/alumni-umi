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
                        <a href="{{ route('print-data') }}" class="btn btn-danger ">
                            <i class="fa-solid fa-file-pdf me-2"></i> PDF
                        </a>

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
                                                    <a href="#tabs-home-7" class="nav-link active" data-bs-toggle="tab">
                                                        <i class="fa-regular fa-user me-2"></i>
                                                        Profile</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tabs-profile-7" class="nav-link" data-bs-toggle="tab">
                                                        <i class="fa-solid fa-user-graduate me-2"></i>
                                                        History Perkuliahan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#tabs-activity-7" class="nav-link" data-bs-toggle="tab">
                                                        <i class="fa-solid fa-paperclip me-2"></i>
                                                        Berkas</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="tabs-home-7">
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
                                                <div class="tab-pane" id="tabs-profile-7">
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
                                                <div class="tab-pane" id="tabs-activity-7">
                                                    <div class="tab-pane active show" id="tabs-home-7">
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
{{-- <div class="main">

    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Alumni
            </h6>
            <div class="">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#filter">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-filter mr-1"></i>
                    </span>
                    <span class="text">Filter</span>
                </button>
                <a href="{{ route('falkutas-excel') }}" class="btn btn-success btn-icon-split btn-sm  ml-auto ">
                    <span class="icon text-white-50">
                        <i class="fa-regular fa-file-excel"></i>
                    </span>
                    <span class="text">Export</span>
                </a>
                <a href="{{ route('print-data') }}" class="btn btn-danger btn-icon-split btn-sm  ml-auto ">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-print"></i>
                    </span>
                    <span class="text">Print</span>
                </a>
                </h6>
                <a href="{{ route('falkutas.create') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                        class="{{ $item->status == 1 ? 'bg-success' : 'bg-danger' }} text-light p-1 font-weight-bold rounded ">{{ $item->status == 1 ? 'Approved' : 'Pending' }}</span>
                                </td>
                                <td class="d-flex">
                                    <!-- Button trigger modal detail -->
                                    <button type="button" class="btn btn-primary" title="Detail" data-toggle="modal"
                                        data-target="#detail{{ $item->id }}">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <a href="{{ route('falkutas.edit', $item->id) }}" title="Edit"
                                        class="btn btn-primary mx-1"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="falkutas/{{ $item->id }}/apv" title="Approve"
                                        class="btn btn-success mr-1"><i class="fa-solid fa-circle-check"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="filter" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filter Export Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                                                placeholder="First name">
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control" name="end"
                                                placeholder="Last name">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Export</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @foreach ($data as $item)
                    <!-- Modal detail-->
                    <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Alumni</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
                                                <div class="card border-0 ">
                                                    <img src="{{ asset('images/alumni/' . $item->file) }}"
                                                        alt="..." class="card-img-top rounded">
                                                    <div class="card-body p-4">
                                                        <div class=" text-center">
                                                            <h5>{{ $item->nama }} </h5>
                                                            <h5>{{ $item->prodis->prodi }} </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="ps-lg-5">
                                                    <div class="mb-5 wow fadeIn">
                                                        <div class="text-start mb-4">
                                                            <h2 class="mb-0 text-primary">#History Perkuliahan</h2>
                                                        </div>
                                                        <div class=" mb-3">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">No ALumni</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->no_alumni }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Nama</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->nama }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">NPM</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->npm }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Program Studi</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->prodis->prodi }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Peminatan</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->minat->peminatan }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Falkutas</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->falkutas }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Stambuk</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->stambuk }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Seminar Proposal</h6>
                                                                    </div>
                                                                    @php
                                                                        $dateString = $item->sempro;
                                                                        $sempro = strftime(
                                                                            '%d %B %Y',
                                                                            strtotime($dateString),
                                                                        );
                                                                    @endphp
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $sempro }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        @php
                                                                            $dateString = $item->semhas;
                                                                            $semhas = strftime(
                                                                                '%d %B %Y',
                                                                                strtotime($dateString),
                                                                            );
                                                                        @endphp
                                                                        <h6 class="mb-0">Seminar Hasil</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $semhas }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Sidang Meja Hijau</h6>
                                                                    </div>
                                                                    @php
                                                                        $dateString = $item->mejahijau;
                                                                        $sidang = strftime(
                                                                            '%d %B %Y',
                                                                            strtotime($dateString),
                                                                        );
                                                                    @endphp
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $sidang }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Yudisium</h6>
                                                                    </div>
                                                                    @php
                                                                        $dateString = $item->yudisium;
                                                                        $yudisium = strftime(
                                                                            '%d %B %Y',
                                                                            strtotime($dateString),
                                                                        );
                                                                    @endphp
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $yudisium }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Judul Skripsi</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->judul }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Dosen Penguji 1</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->penguji1 }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Dosen Penguji 2</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->penguji2 }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">IPK</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->ipk }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Tahun Lulus</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->thn_lulus }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Pekerjaan</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->pekerjaan }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Status</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <span
                                                                            class="{{ $item->status == 1 ? 'bg-success' : 'bg-danger' }} text-light p-1 font-weight-bold rounded-pill px-3 ">{{ $item->status == 1 ? 'Approved' : 'Pending' }}</span>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="text-start mb-4">
                                                                    <h2 class="mb-0 text-primary">#Informasi Pribadi
                                                                    </h2>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">NIK</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->nik }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Tanggal Lahir</h6>
                                                                    </div>
                                                                    @php
                                                                        $dateString = $item->tanggal_lhr;
                                                                        $tanggal_lhr = strftime(
                                                                            '%d %B %Y',
                                                                            strtotime($dateString),
                                                                        );
                                                                    @endphp
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $tanggal_lhr }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Tempat Lahir</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->tempat_lhr }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Nama Ayah</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->ayah }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Nama Ibu</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->ibu }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Alamat</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        {{ $item->alamat }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="text-start mb-4">
                                                                    <h2 class="mb-0 text-primary">#Berkas
                                                                    </h2>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Ijazah SMA</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <img src="{{ asset('images/ijazah/' . $item->ijazah) }}"
                                                                            alt="..." class="card-img-top">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Foto KTP</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                        <img src="{{ asset('images/ktp/' . $item->ktp) }}"
                                                                            alt="..." class="card-img-top">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div> --}}
