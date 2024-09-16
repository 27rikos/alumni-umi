@extends('Partials.falkutas')
@section('title', 'edit alumni')
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
                                Data Alumni
                            </h2>
                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('falkutas.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Alumni</li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Alumni</li>
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
                    <a href="{{ route('falkutas.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('falkutas.update', $find->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_alumni" class="form-label">No Alumni</label>
                                    <input type="text" class="form-control" id="no_alumni" name="no_alumni"
                                        value="{{ $find->no_alumni }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="text" class="form-control" id="npm" name="npm"
                                        value="{{ $find->npm }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $find->nama }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lhr" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr"
                                        value="{{ $find->tempat_lhr }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lhr" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lhr" name="tanggal_lhr"
                                        value="{{ $find->tanggal_lhr }}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $find->alamat }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="stambuk" class="form-label">Stambuk</label>
                                    <input type="text" class="form-control" id="stambuk" name="stambuk"
                                        value="{{ $find->stambuk }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="peminatan" class="form-label">Peminatan</label>
                                    <select name="peminatan" id="peminatan" class="form-select" required>
                                        @foreach ($peminatan as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $find->minat->peminatan == $item->peminatan ? 'selected' : '' }}>
                                                {{ $item->peminatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="studi" class="form-label">Program Studi</label>
                                    <select name="prodi" id="studi" class="form-select" required>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $find->prodis->prodi == $item->prodi ? 'selected' : '' }}>
                                                {{ $item->prodi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="lulus" class="form-label">Tahun Lulus</label>
                                    <input type="text" class="form-control" id="lulus" name="thn_lulus"
                                        value="{{ $find->thn_lulus }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ipk" class="form-label">IPK</label>
                                    <input type="text" class="form-control" id="ipk" name="ipk"
                                        value="{{ $find->ipk }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        value="{{ $find->nik }}">
                                </div>
                                <div class="mb-3">
                                    <label for="ktp" class="form-label">KTP</label>
                                    <input type="file" class="form-control" id="ktp" accept="image/*"
                                        name="ktp">
                                    <img id="ktp-preview" src="" class="rounded mt-2" alt="KTP Preview"
                                        style="display:none; width: 200px; height: auto;">
                                </div>
                                <div class="mb-3">
                                    <label for="ijazah" class="form-label">Ijazah</label>
                                    <input type="file" class="form-control" id="ijazah" accept="image/*"
                                        name="ijazah">
                                    <img id="ijazah-preview" src="" class="rounded mt-2" alt="Ijazah Preview"
                                        style="display:none; width: 200px; height: auto;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="penguji1" class="form-label">Dosen Penguji 1</label>
                                    <input type="text" class="form-control" id="penguji1" name="penguji1"
                                        value="{{ $find->penguji1 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="penguji2" class="form-label">Dosen Penguji 2</label>
                                    <input type="text" class="form-control" id="penguji2" name="penguji2"
                                        value="{{ $find->penguji2 }}">
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                        value="{{ $find->pekerjaan }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ayah" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="ayah" name="ayah"
                                        value="{{ $find->ayah }}">
                                </div>
                                <div class="mb-3">
                                    <label for="ibu" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="ibu" name="ibu"
                                        value="{{ $find->ibu }}">
                                </div>
                                <div class="mb-3">
                                    <label for="sempro" class="form-label">Tanggal Seminar Proposal</label>
                                    <input type="date" class="form-control" id="sempro" name="sempro" required
                                        value="{{ $find->sempro }}">
                                </div>
                                <div class="mb-3">
                                    <label for="semhas" class="form-label">Tanggal Seminar Hasil</label>
                                    <input type="date" class="form-control" id="semhas" name="semhas" required
                                        value="{{ $find->semhas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="mejahijau" class="form-label">Tanggal Meja Hijau</label>
                                    <input type="date" class="form-control" id="mejahijau" name="mejahijau" required
                                        value="{{ $find->mejahijau }}">
                                </div>
                                <div class="mb-3">
                                    <label for="yudisium" class="form-label">Yudisium</label>
                                    <input type="date" class="form-control" id="yudisium" name="yudisium" required
                                        value="{{ $find->yudisium }}">
                                </div>
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Skripsi</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ $find->judul }}">
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Foto Alumni</label>
                                    <input type="file" class="form-control" id="image-input" accept="image/*"
                                        name="file">
                                </div>
                                <img id="image-preview" src="" class="rounded" alt="Image Preview"
                                    style="display:none; width: 200px; height: auto;">
                            </div>
                        </div>
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
        // Function to preview images
        function previewImage(input, previewId) {
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgElement = document.getElementById(previewId);
                    imgElement.src = event.target.result;
                    imgElement.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        // Event listeners for file inputs
        document.getElementById('image-input').addEventListener('change', function() {
            previewImage(this, 'image-preview');
        });

        document.getElementById('ktp').addEventListener('change', function() {
            previewImage(this, 'ktp-preview');
        });

        document.getElementById('ijazah').addEventListener('change', function() {
            previewImage(this, 'ijazah-preview');
        });
    </script>
    {{-- End preview script --}}
@endsection
