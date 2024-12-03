@extends('Partials.AdminDashboard')
@section('title', 'Kelola Admin')
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
                                Kerjasama
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('cooperation.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Kerjasama</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Kerjasama</li>
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
                    <a href="{{ route('cooperation.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('cooperation.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="instansi" class="form-label">Nama Instansi</label>
                            <input type="text" class="form-control" id="instansi" name="instansi"required
                                value="{{ $data->instansi }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="jenis_kerjasama" class="form-label">Jenis Kerjasama</label>
                            <select name="jenis_kerjasama" id="select_box" class="form-select">
                                <option value="">Pilih Kerjasama</option>
                                @foreach ($jenis_kerjasama as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $data->jenis_kerjasama ? 'selected' : '' }}>
                                        {{ $item->jenis_kerjasama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="tanggal_mulai"
                                        name="tanggal_mulai"required value="{{ $data->tanggal_mulai }}">
                                </div>
                                <div class="col-md-6" class="form-label">
                                    <label for="password">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" class="form-control" id="tanggal_selesai"
                                        required value="{{ $data->tanggal_selesai }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="file" class="form-label">Bukti Dokumen</label>
                                    <input type="file" name="file" class="form-control" accept=".pdf">
                                </div>
                                <div class="col-md-6">
                                    <label for="foto" class="form-label">Logo Instansi</label>
                                    <input type="file" name="foto" class="form-control" accept=".png,.jpeg,.jpg"
                                        id="image-input">
                                    <img id="image-preview" src="" class="rounded img-fluid mt-4"
                                        alt="Image Preview" style="display:none; width: 200px; height: auto;" />
                                </div>
                            </div>

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
@push('script')
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
    {{-- end  --}}
    <script>
        function initSelectBox(select_box_element) {
            dselect(select_box_element, {
                search: true
            });
        }

        // Inisialisasi untuk dua selectbox
        var select_box_element1 = document.querySelector('#select_box');

        initSelectBox(select_box_element1);
    </script>
@endpush
