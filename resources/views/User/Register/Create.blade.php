@extends('partials.Person')
@section('content')
<div class="container">
    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex">
          <h6 class="m-0 font-weight-bold text-primary">
            Tambah Data Alumni
          </h6>
        
        </div>
        <div class="card-body">
            <form action="{{ route('Daftar.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label for="npm">NPM*</label>
                    <input type="text" class="form-control" id="npm" name="npm"required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama*</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>
                  <div class="form-group">
                    <label for="stambuk">Stambuk*</label>
                    <input type="text" class="form-control" id="stambuk" name="stambuk"required>
                  </div>
                  <div class="form-group">
                    <label for="peminatan">Peminatan*</label>
                    <select name="peminatan" id="peminatan" class="form-control" required>
                        <option value="">--Pilih--</option>
                        @foreach ($peminatan as $item)
                     
                        <option value="{{ $item->id }}">{{ $item->peminatan }}</option>
                            
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="studi">Program Studi*</label>
                    <select name="prodi" id="studi" class="form-control" required>
                      <option value="">--Pilih--</option>
                       @foreach ($prodi as $item)
                     
                       <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                           
                       @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="lulus">Tahun Lulus*</label>
                    <input type="text" class="form-control" id="lulus" name="thn_lulus" required>
                  </div>
                  <div class="form-group">
                    <label for="sempro">Tanggal Seminar Proposal*</label>
                    <input type="date" class="form-control" id="sempro" name="sempro" required >
                  </div>
                  <div class="form-group">
                    <label for="semhas">Tanggal Seminar Hasil*</label>
                    <input type="date" class="form-control" id="semhas" name="semhas" required>
                  </div>
                  <div class="form-group">
                    <label for="mejahijau">Tanggal Meja Hijau*</label>
                    <input type="date" class="form-control" id="mejahijau" name="mejahijau" required >
                  </div>
                  <div class="form-group">
                    <label for="yudisium">Yudisium*</label>
                    <input type="date" class="form-control" id="yudisium" name="yudisium" required>
                  </div>
                  <div class="form-group">
                    <label for="judul">Judul SKripsi</label>
                    <input type="text" class="form-control" id="judul" name="judul" >
                  </div>
                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" >
                  </div>
                  <div class="form-group">
                    <label for="file">Foto Alumni*</label>
                    <input type="file" class="form-control-file" id="file" name="file" required>
                  </div>
                  <div class="form-group">
                   <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
            </form>
        </div>
      </div>
</div>
@endsection