@extends('Partials.Person')
@section('title', 'data pribadi')
@section('content')

    <div class="container-xl d-flex flex-column justify-content-center">
        @forelse ($data as $item)
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tabs-home-3" class="nav-link active" data-bs-toggle="tab">
                                <i class="fa-regular fa-user me-2"></i>
                                Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-profile-3" class="nav-link" data-bs-toggle="tab">
                                <i class="fa-solid fa-user-graduate me-2"></i>
                                History Perkuliahan</a>
                        </li>
                    </ul>
                    <a href="{{ url('validation/' . $item->id) }}" class="btn btn-danger"><i
                            class="fa-regular fa-file-pdf"></i></a>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-home-3">
                            <div class="row">
                                <!-- Image Column -->
                                <div class="col-md-4 col-sm-12 text-center mb-3">
                                    <img src="{{ asset('images/alumni/' . $item->file) }}" alt="Alumni Photo"
                                        class="img-fluid rounded" style="max-width: 100%; height: auto;">
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
                                                    $tanggal_lhr = strftime('%d %B %Y', strtotime($dateString));
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
                        <div class="tab-pane" id="tabs-profile-3">
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
                                            $sempro = strftime('%d %B %Y', strtotime($dateString));
                                        @endphp
                                        <td>{{ $sempro }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Seminar Hasil</th>
                                        @php
                                            $dateString = $item->semhas;
                                            $semhas = strftime('%d %B %Y', strtotime($dateString));
                                        @endphp
                                        <td>{{ $semhas }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sidang Meja Hijau</th>
                                        @php
                                            $dateString = $item->mejahijau;
                                            $sidang = strftime('%d %B %Y', strtotime($dateString));
                                        @endphp
                                        <td>{{ $sidang }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Yudisium</th>
                                        @php
                                            $dateString = $item->yudisium;
                                            $yudisium = strftime('%d %B %Y', strtotime($dateString));
                                        @endphp
                                        <td>{{ $yudisium }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Judul Skripsi</th>
                                        <td>{{ $item->judul }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dosen Penguji 1</th>
                                        <td>{{ $item->dosenpenguji1->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dosen Penguji 2</th>
                                        <td>{{ $item->dosenpenguji2->nama }}</td>
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
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/info-circle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                            <path d="M12 9h.01" />
                            <path d="M11 12h1v4h1" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="alert-title">Perhatikan</h4>
                        <div class="text-secondary">Data anda belum anda daftar/input/Approve oleh <strong>Admin
                                UMI</strong></div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection
