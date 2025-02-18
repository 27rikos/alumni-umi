@extends('Partials.AdminDashboard')
@section('title', 'Kelola Kerjasama')
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
                                Jenis Kerjasama
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('cooperation-type.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Jenis Kerjasama</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Jenis Kerjasama</li>
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
                    <a href="{{ route('cooperation-type.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('cooperation-type.update', $data->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group mb-2">
                            <label for="jenis_kerjasama" class="form-label">Jenis Kerjasama</label>
                            <input type="text" class="form-control" id="jenis_kerjasama" name="jenis_kerjasama"required
                                value="{{ $data->jenis_kerjasama }}">
                        </div>
                        <div class="mb-3">
                            <label for="x" class="form-label">Deskripsi</label>
                            <textarea id="tinymce-mytextarea" name="deskripsi">{!! $data->deskripsi !!}</textarea>
                        </div>

                        <div class="form-group mb-2 mt-3">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
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
