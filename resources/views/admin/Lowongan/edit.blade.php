@extends('Partials.AdminDashboard')
@section('title', 'Lowongan')
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
                                Lowongan Kerja
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('jobfair.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Lowongan Kerja</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Lowongan Kerja</li>
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
                    <a href="{{ route('jobfair.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('jobfair.update', $data->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="nama"class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"required
                                value="{{ $data->nama }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="perusahaan"class="form-label">Perusahaan</label>
                            <input type="text" class="form-control" id="perusahaan" name="perusahaan"required
                                value="{{ $data->perusahaan }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="posisi"class="form-label">Posisi</label>
                            <input type="text" class="form-control" id="posisi" name="posisi"required
                                value="{{ $data->posisi }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for=""class="form-label">Kualifikasi</label>
                            <textarea id="tinymce-mytextarea" name="kualifikasi">{!! $data->kualifikasi !!}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="gaji"class="form-label">Gaji</label>
                            <input type="text" class="form-control" id="gaji" name="gaji"required
                                value="{{ $data->gaji }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kontak"class="form-label">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak"required
                                value="{{ $data->kontak }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email"class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"required
                                value="{{ $data->email }}">
                        </div>
                        <div class="form-group mb-3 mt-3">
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
@push('script')
    <script>
        // Ambil elemen input berdasarkan ID
        const posisiInput = document.getElementById('gaji');

        // Tambahkan event listener untuk format saat mengetik
        posisiInput.addEventListener('input', function(event) {
            // Hapus semua karakter non-digit
            let value = this.value.replace(/\D/g, '');

            // Format angka dengan titik pemisah ribuan
            value = new Intl.NumberFormat('id-ID').format(value);

            // Tampilkan hasil format ke dalam input
            this.value = value;
        });
    </script>
@endpush
