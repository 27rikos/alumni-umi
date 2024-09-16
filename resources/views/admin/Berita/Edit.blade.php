@extends('Partials.AdminDashboard')
@section('title', 'Edit Berita')
@section('content')
    <div class="container-xl min-vh-100">
        <div class="page-header d-print-none mb-5">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page Title and Breadcrumb Container -->
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Page Title -->
                            <h2 class="page-title mt-3">
                                Berita
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Berita</li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Berita</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('berita.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.update', $find->id) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control" id="judul" name="judul" required
                                value="{{ $find->judul }}">
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="penulis" name="penulis" required
                                value="{{ $find->penulis }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required
                                value="{{ $find->tanggal }}">
                        </div>
                        <div class="mb-3">
                            <label for="x" class="form-label">Konten</label>
                            <textarea id="tinymce-mytextarea" name="konten">{!! $find->konten !!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="image-input" accept="image/*" name="file">
                        </div>
                        <img id="image-preview" src="" class="img-fluid rounded" alt="Image Preview"
                            style="display:none; width: 200px; height: auto;">
                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>


                </div>
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
    @push('MCE')
        <script>
            // @formatter:off
            document.addEventListener("DOMContentLoaded", function() {
                let options = {
                    selector: '#tinymce-mytextarea',
                    height: 300,
                    menubar: false,
                    statusbar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat',
                    content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
                }
                if (localStorage.getItem("tablerTheme") === 'dark') {
                    options.skin = 'oxide-dark';
                    options.content_css = 'dark';
                }
                tinyMCE.init(options);
            })
            // @formatter:on
        </script>
    @endpush
@endsection
