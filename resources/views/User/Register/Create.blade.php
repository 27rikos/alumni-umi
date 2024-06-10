@extends('partials.Person')
@section('title', 'Registrasi Alumni')
@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-5">Petunjuk Registrasi Alumni : </h3>
            <ol>
                <li>Gunakan NPM yang sama seperti saat Anda mendaftar akun</li>
                <li>Isi setiap field input pada form pengisian data</li>
                <li>Isi semua inputan yang bertanda <span class="text-danger">*</span></li>
                <li>Format foto yang dapat diupload: JPG, JPEG, PNG.</li>
                <li>Ukuran maksimal foto: 2MB.</li>

            </ol>
        </div>
    </div>
    <div class="main">
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
                        <label for="npm">NPM <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="npm" name="npm"required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="stambuk">Stambuk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="stambuk" name="stambuk"required>
                    </div>
                    <div class="form-group">
                        <label for="peminatan">Peminatan <span class="text-danger">*</span></label>
                        <select name="peminatan" id="peminatan" class="form-control" required>
                            <option value="">--Pilih--</option>
                            @foreach ($peminatan as $item)
                                <option value="{{ $item->id }}">{{ $item->peminatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="studi">Program Studi <span class="text-danger">*</span></label>
                        <select name="prodi" id="studi" class="form-control" required>
                            <option value="">--Pilih--</option>
                            @foreach ($prodi as $item)
                                <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lulus">Tahun Lulus <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lulus" name="thn_lulus" required>
                    </div>
                    <div class="form-group">
                        <label for="sempro">Tanggal Seminar Proposal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="sempro" name="sempro" required>
                    </div>
                    <div class="form-group">
                        <label for="semhas">Tanggal Seminar Hasil <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="semhas" name="semhas" required>
                    </div>
                    <div class="form-group">
                        <label for="mejahijau">Tanggal Meja Hijau <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="mejahijau" name="mejahijau" required>
                    </div>
                    <div class="form-group">
                        <label for="yudisium">Yudisium <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="yudisium" name="yudisium" required>
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul SKripsi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                    </div>
                    <div class="form-group">
                        <label for="file"class="mb-3">Foto Alumni <span class="text-danger">*</span></label>
                        <input type="file" class="form-control-file" id="image-input" accept="image/*"
                            name="file">
                    </div>
                    <img id="image-preview" src="" class="rounded" alt="Image Preview"
                        style="display:none; width: 200px; height: auto;" />
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
