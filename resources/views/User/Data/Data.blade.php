@extends('Partials.Person')
@section('title', 'data pribadi')
@section('content')

    <div class="container-xl d-flex flex-column justify-content-center">
        @forelse ($data as $item)
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn mt-3">
                        <div class=" border-0 ">
                            <img src="{{ asset('images/alumni/' . $item->file) }}" alt="..." class="card-img-top rounded">
                            <div class="card-body p-4">
                                <div class=" text-center">
                                    <h5>{{ $item->nama }} </h5>
                                    <h5>{{ $item->prodis->prodi }} </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="pl-lg-5">
                            <div class="mb-5 wow fadeIn mt-3">
                                <div class="d-flex justify-content-between mb-4">
                                    <h2 class="mb-0 text-primary">#History Perkuliahan</h2>
                                    <a href="{{ url('validation/' . $item->id) }}" class=" btn btn-info"><i
                                            class="fa-regular fa-file-pdf mr-1"></i>Cetak</a>
                                </div>
                                <div class=" mb-3">
                                    <div class="card-body">
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
                                                $sempro = strftime('%d %B %Y', strtotime($dateString));
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
                                                    $semhas = strftime('%d %B %Y', strtotime($dateString));
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
                                                $sidang = strftime('%d %B %Y', strtotime($dateString));
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
                                                $yudisium = strftime('%d %B %Y', strtotime($dateString));
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info mt-3" role="alert">
                Data anda belum anda daftar/input/Approve oleh <strong>Admin UMI</strong>
            </div>
        @endforelse
    </div>
@endsection
