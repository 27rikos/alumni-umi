@extends('Partials.AdminDashboard')
@section('title', 'Edit Berita')
@section('content')
    <div class="main">
        <div class="card shadow mb-4 my-2 my-3">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Edit Berita
                </h6>
                <a href="{{ route('berita.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('berita.update', $find->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input type="text" class="form-control" id="judul" name="judul" required
                            value="{{ $find->judul }}">
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" required
                            value="{{ $find->penulis }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required
                            value="{{ $find->tanggal }}">
                    </div>
                    <div class="form-group">
                        <label for="x">Konten</label>
                        <input id="x" type="hidden" name="konten" value="{{ $find->konten }}">
                        <trix-editor input="x"></trix-editor>
                    </div>
                    <div class="form-group">
                        <label for="file"class="mb-3">Foto</label>
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
