@extends('Partials.AdminDashboard')
@section('title','Alumni')
@section('content')
<div class="container">
    
    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex">
          <h6 class="m-0 font-weight-bold text-primary">
            Data Alumni
          </h6>
        <a href="{{ route('alumni.create') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
            <span class="icon text-white-50">
                <i class="fa-solid fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table
              class="table table-bordered"
              id="dataTable"
              width="100%"
              cellspacing="0"
            >
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
                @foreach ($alumni as $item)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama}}</td>
                <td>{{ $item->npm }}</td>
                <td>{{ $item->stambuk }}</td>
                <td><span class="{{ ($item->status==1)? 'bg-success':'bg-danger' }} text-light p-1 font-weight-bold rounded ">{{ ($item->status==1)? 'Approved':'Pending' }}</span></td>
                <td class="d-flex">
                  <!-- Button trigger modal detail -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail{{ $item->id }}">
  <i class="fa-regular fa-eye"></i>
</button>

<!-- Modal detail-->
<div class="modal fade" id="detail{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Alumni</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row ">
          <div class="col text-center my-3">
            <img src="{{ asset('storage/alumni_foto/'.$item->file) }}" alt=".." class="rounded" id="profile" style="width:250px;">
          </div>
          <div class="col ">
            <div class="container">
              <table class="table table-striped">
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
                    <td>{{ $item->mejahijau}}</td>
                </tr>
                <tr>
                    <th>Tanggal Yudisium</th>
                      <td>:</td>
                    <td>{{ $item->yudisium }}</td>
                </tr> 
                <tr>
                  <th>Judul Skripsi</th>
                    <td>:</td>
                  <td>{{ $item->judul }}</td>
              </tr>                       
                <tr>
                  <th>Pekerjaan</th>
                    <td>:</td>
                  <td>{{ $item->pekerjaan }}</td>
              </tr>                       
            </table>       
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

                  <a href="{{ route('alumni.edit',$item->id) }}" class="btn btn-primary mx-1"><i class="fa-regular fa-pen-to-square"></i></a>
                  <a href="/alumni/{{ $item->id }}/apv" class="btn btn-success mr-1"><i class="fa-solid fa-circle-check"></i></a>

                  <form action="{{ route('alumni.destroy',$item->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
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