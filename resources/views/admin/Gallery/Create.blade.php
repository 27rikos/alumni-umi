@extends('Partials.AdminDashboard')
@section('title', 'Tambah Foto')
@section('content')
    <div class="main">
        <div class="card shadow mb-4 my-2 my-3">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Tambah Foto
                </h6>
                <a href="{{ route('gallery.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto ">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
