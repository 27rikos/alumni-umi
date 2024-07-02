@extends('Partials.falkutas')
@section('title', 'tambah alumni')
@section('content')
<div class="main">
    <div class="card shadow mb-4 my-2 my-3">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Tambah Data Alumni
            </h6>
            <a href="{{ route('falkutas.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
                <span class="icon text-white-50">
                    <i class="fa-solid fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('falkutas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="npm">No Alumni</label>
                            <input type="text" class="form-control" id="no_alumni" name="no_alumni" >
                        </div>
                        <div class="form-group">
                            <label for="npm">NPM</label>
                            <input type="text" class="form-control" id="npm" name="npm" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lhr">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr" >
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lhr">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lhr" name="tanggal_lhr" >
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="stambuk">Stambuk</label>
                            <input type="text" class="form-control" id="stambuk" name="stambuk" required>
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
                            <label for="studi">Program Studi</label>
                            <select name="prodi" id="studi" class="form-control" required>
                                <option value="">--Pilih--</option>
                                @foreach ($prodi as $item)
                                    <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lulus">Tahun Lulus</label>
                            <input type="text" class="form-control" id="lulus" name="thn_lulus" required>
                        </div>
                        <div class="form-group">
                            <label for="ipk">IPK</label>
                            <input type="text" class="form-control" id="ipk" name="ipk" >
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" >
                        </div>
                        <div class="form-group">
                            <label for="ayah">Nama Ayah</label>
                            <input type="text" class="form-control" id="ayah" name="ayah" >
                        </div>
                        <div class="form-group">
                            <label for="ibu">Nama Ibu</label>
                            <input type="text" class="form-control" id="ibu" name="ibu" >
                        </div>
                        <div class="form-group">
                            <label for="sempro">Tanggal Seminar Proposal*</label>
                            <input type="date" class="form-control" id="sempro" name="sempro" required>
                        </div>
                        <div class="form-group">
                            <label for="semhas">Tanggal Seminar Hasil*</label>
                            <input type="date" class="form-control" id="semhas" name="semhas" required>
                        </div>
                        <div class="form-group">
                            <label for="mejahijau">Tanggal Meja Hijau*</label>
                            <input type="date" class="form-control" id="mejahijau" name="mejahijau" required>
                        </div>
                        <div class="form-group">
                            <label for="yudisium">Yudisium*</label>
                            <input type="date" class="form-control" id="yudisium" name="yudisium" required>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Skripsi</label>
                            <input type="text" class="form-control" id="judul" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="file" class="mb-3">Foto Alumni</label>
                            <input type="file" class="form-control-file" id="image-input" accept="image/*" name="file">
                        </div>
                        <img id="image-preview" src="" class="rounded" alt="Image Preview" style="display:none; width: 200px; height: auto;" />
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

    {{-- preview foto --}}
    <script>
        document.getElementById('image-input').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgElement = document.createElement("img");
                    imgElement.src = event.target.result;
                    imgElement.onload = function(e) {
                        const canvas = document.createElement("canvas");
                        const MAX_WIDTH = 800;

                        const scaleSize = MAX_WIDTH / e.target.width;
                        canvas.width = MAX_WIDTH;
                        canvas.height = e.target.height * scaleSize;

                        const ctx = canvas.getContext("2d");
                        ctx.drawImage(e.target, 0, 0, canvas.width, canvas.height);

                        const srcEncoded = ctx.canvas.toDataURL(e.target, "image/jpeg");

                        // Tampilkan gambar
                        document.getElementById('image-preview').src = srcEncoded;
                        document.getElementById('image-preview').style.display = 'block';
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    {{--  --}}
@endsection
