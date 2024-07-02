@extends('Partials.falkutas')
@section('title','Alumni')
@section('content')
<div class="main">

    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">
                Data Alumni
            </h6>
            <div class="">
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
                                                                        <h2 class="mb-0 text-primary">#Informasi Pribadi</h2>
                                                                    </div>
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
</div>
@endsection
