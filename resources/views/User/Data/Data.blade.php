@extends('Partials.Person')
@section('title','data pribadi')
@section('content')
    <div class="card shadow">
      @forelse ($data as $item)
      <div class="row p-3">
        <div class="col-md-2 text-center"><img src="{{ asset('storage/alumni_foto/'.$item->file) }}" class="rounded p-3" style="width:150px;height:150px" srcset=""></div>
        <div class="col-md-5">
            <div class="data">
                <h4>Profil Alumni</h4>
                <table class="table table-borderless">
                    <tr>
                        <th>NPM</th>
                        <td>:</td>
                        <td>{{ $item->npm }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                          <td>:</td>
                        <td>{{ $item->nama }}</td>
                    </tr>
                    <tr>
                        <th>Stambuk</th>
                          <td>:</td>
                        <td>{{ $item->stambuk }}</td>
                    </tr>
                    <tr>
                        <th>Peminatan</th>
                          <td>:</td>
                        <td>{{ $item->minat->peminatan }}</td>
                    </tr>
                    <tr>
                        <th>Program Studi</th>
                          <td>:</td>
                        <td>{{ $item->prodis->prodi }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Lulus</th>
                          <td>:</td>
                        <td>{{ $item->thn_lulus }}</td>
                    </tr>
                    <tr>
                        <th>Tangal Seminar Proposal</th>
                          <td>:</td>
                        <td>{{ $item->sempro }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Seminar Akhir</th>
                          <td>:</td>
                        <td>{{ $item->semhas }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Meja Hijau</th>
                          <td>:</td>
                        <td>{{ $item->mejahijau }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Yudisium</th>
                          <td>:</td>
                        <td>{{ $item->yudisium }}</td>
                    </tr> 
                    <tr>
                      <th>Judul Skripsi</th>
                        <td>:</td>
                      <td class="text-justify">{{ $item->judul }}</td>
                  </tr>                       
                </table>       
            </div>
        </div>
        <div class="col-md-5">
            <h4>Pekerjaan</h4>
            <table class=" table table-borderless">
                <tr>
                    <th>Pekerjaan</th>
                      <td>:</td>
                    <td>{{ $item->pekerjaan }}</td>
                </tr>
                <tr>
                    <th>Profil</th>
                      <td>:</td>
                    <td>tgl</td>
                </tr> 
            </table>
        </div>
    </div>
      @empty
      <div class="alert alert-info mt-3" role="alert">
        Data anda belum anda daftar/input/Approve oleh <strong>Admin UMI</strong>
      </div>
      @endforelse
        
    </div>
@endsection