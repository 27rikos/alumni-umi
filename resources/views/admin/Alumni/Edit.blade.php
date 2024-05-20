@extends('Partials.AdminDashboard')
@section('title', 'Edit alumni')
@section('content')
    <div class="main">
        <div class="card shadow mb-4 my-2 my-3">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Edit Alumni
                </h6>
                <a href="{{ route('alumni.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('alumni.update', $find->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="npm">NPM*</label>
                        <input type="text" class="form-control" id="npm" name="npm"
                            value="{{ $find->npm }}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama*</label>
                        <input type="text" class="form-control" id="nama" name="nama" required
                            value="{{ $find->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="stambuk">Stambuk*</label>
                        <input type="text" class="form-control" id="stambuk" name="stambuk"required
                            value="{{ $find->stambuk }}">
                    </div>
                    <div class="form-group">
                        <label for="peminatan">Peminatan*</label>
                        <select name="peminatan" id="peminatan" class="form-control" required>
                            @foreach ($peminatan as $item)
                                <option
                                    value="{{ $item->id }}"{{ $find->minat->peminatan == $item->peminatan ? 'selected' : '' }}>
                                    {{ $item->peminatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="studi">Program Studi*</label>
                        <select name="prodi" id="studi" class="form-control" required>
                            @foreach ($prodi as $item)
                                <option
                                    value="{{ $item->id }}"{{ $find->prodis->prodi == $item->prodi ? 'selected' : '' }}>
                                    {{ $item->prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lulus">Tahun Lulus*</label>
                        <input type="text" class="form-control" id="lulus" name="thn_lulus" required
                            value="{{ $find->thn_lulus }}">
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required
                            value="{{ $find->pekerjaan }}">
                    </div>
                    <div class="form-group">
                        <label for="sempro">Tanggal Seminar Proposal*</label>
                        <input type="date" class="form-control" id="sempro" name="sempro" required
                            value="{{ $find->sempro }}">
                    </div>
                    <div class="form-group">
                        <label for="semhas">Tanggal Seminar Hasil*</label>
                        <input type="date" class="form-control" id="semhas" name="semhas" required
                            value="{{ $find->semhas }}">
                    </div>
                    <div class="form-group">
                        <label for="mejahijau">Tanggal Meja Hijau*</label>
                        <input type="date" class="form-control" id="mejahijau" name="mejahijau" required
                            value="{{ $find->mejahijau }}">
                    </div>
                    <div class="form-group">
                        <label for="yudisium">Yudisium*</label>
                        <input type="date" class="form-control" id="yudisium" name="yudisium" required
                            value="{{ $find->yudisium }}">
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul SKripsi</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            value="{{ $find->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="file"class="mb-3">Foto Alumni</label>
                        <input type="file" class="form-control-file" id="image-input" accept="image/*" name="file">
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
