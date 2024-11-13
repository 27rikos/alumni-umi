@extends('Partials.Person')
@section('title', 'Registrasi Alumni')
@section('content')
    <div class="page-header d-print-none mb-3">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Registrasi Data Alumni
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl min-vh-100">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form action="{{ route('Daftar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="text" class="form-control" readonly id="npm" name="npm"
                                        value="{{ $data->npm }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" readonly id="nama" name="nama"
                                        value="{{ $data->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lhr" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lhr" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lhr" name="tanggal_lhr">
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="provinsi" class="form-label">Provinsi</label>
                                                <select class="form-control select_box" id="provinsi" name="provinsi">
                                                    <option value="">Pilih Provinsi</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kota" class="form-label">Kota/Kabupaten</label>
                                                <select class="form-control select_box" id="kota" name="kota"
                                                    disabled>
                                                    <option value="">Pilih Kota/Kabupaten</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <select class="form-control select_box" id="kecamatan" name="kecamatan"
                                                    disabled>
                                                    <option value="">Pilih Kecamatan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                                <select class="form-control select_box" id="kelurahan" name="kelurahan"
                                                    disabled>
                                                    <option value="">Pilih Kelurahan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="stambuk" class="form-label">Stambuk</label>
                                    <input type="text" class="form-control" id="stambuk" name="stambuk">
                                </div>
                                <div class="mb-3">
                                    <label for="peminatan" class="form-label">Peminatan</label>
                                    <select name="peminatan" id="peminatan" class="form-select">
                                        <option value="">Pilih Peminatan</option>
                                        @foreach ($peminatan as $item)
                                            <option value="{{ $item->id }}">{{ $item->peminatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="studi" class="form-label">Program Studi</label>
                                    <select name="prodi" id="studi" class="form-select">
                                        <option value="">Pilih Program Studi</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="fakultas" class="form-label">Fakultas</label>
                                    <select name="fakultas" id="fakultas" class="form-select">
                                        <option value="">Pilih Fakultas</option>
                                        <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                        <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                                        <option value="Fakultas Sastra">Fakultas Sastra</option>
                                        <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                                        <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik">
                                </div>
                                <div class="mb-3">
                                    <label for="ktp" class="form-label">KTP</label>
                                    <input type="file" class="form-control" id="ktp" accept="image/*"
                                        name="ktp">
                                    <img id="ktp-preview" src="" class="rounded mt-2 img-fluid"
                                        alt="KTP Preview" style="display:none; width: 200px; height: auto;" />
                                </div>
                                <div class="mb-3">
                                    <label for="ijazah" class="form-label">Ijazah</label>
                                    <input type="file" class="form-control" id="ijazah" accept="image/*"
                                        name="ijazah">
                                    <img id="ijazah-preview" src="" class="rounded mt-2 img-fluid"
                                        alt="Ijazah Preview" style="display:none; width: 200px; height: auto;" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pembimbing1" class="form-label">Dosen Pembimbing 1</label>
                                    <select name="pembimbing1" id="select_box1" class="form-select">
                                        <option value="">Pilih Dosen Pembimbing 1</option>
                                        @foreach ($dosens as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pembimbing2" class="form-label">Dosen Pembimbing 2</label>
                                    <select name="pembimbing2" id="select_box2" class="form-select">
                                        <option value="">Pilih Dosen Pembimbing 2</option>
                                        @foreach ($dosens as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="penguji1" class="form-label">Dosen Penguji 1</label>
                                    <select name="penguji1" id="select_box3" class="form-select">
                                        <option value="">Pilih Dosen Penguji 1</option>
                                        @foreach ($dosens as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="penguji2" class="form-label">Dosen Penguji 2</label>
                                    <select name="penguji2" id="select_box4" class="form-select">
                                        <option value="">Pilih Dosen Penguji 2</option>
                                        @foreach ($dosens as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ayah" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="ayah" name="ayah">
                                </div>
                                <div class="mb-3">
                                    <label for="ibu" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="ibu" name="ibu">
                                </div>
                                <div class="mb-3">
                                    <label for="sempro" class="form-label">Tanggal Seminar Proposal</label>
                                    <input type="date" class="form-control" id="sempro" name="sempro">
                                </div>
                                <div class="mb-3">
                                    <label for="semhas" class="form-label">Tanggal Seminar Hasil</label>
                                    <input type="date" class="form-control" id="semhas" name="semhas">
                                </div>
                                <div class="mb-3">
                                    <label for="mejahijau" class="form-label">Tanggal Meja Hijau</label>
                                    <input type="date" class="form-control" id="mejahijau" name="mejahijau">
                                </div>
                                <div class="mb-3">
                                    <label for="yudisium" class="form-label">Yudisium</label>
                                    <input type="date" class="form-control" id="yudisium" name="yudisium">
                                </div>
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Skripsi</label>
                                    <input type="text" class="form-control" id="judul" name="judul">
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Foto Alumni</label>
                                    <input type="file" class="form-control" id="image-input" accept="image/*"
                                        name="file">
                                </div>
                                <img id="image-preview" src="" class="rounded" alt="Image Preview"
                                    style="display:none; width: 200px; height: auto;" />
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
@endsection
@push('script')
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
    {{-- end preview --}}
    <script>
        function initSelectBox(select_box_element) {
            dselect(select_box_element, {
                search: true
            });
        }

        // Inisialisasi untuk dua selectbox
        var select_box_element1 = document.querySelector('#select_box1');
        var select_box_element2 = document.querySelector('#select_box2');
        var select_box_element3 = document.querySelector('#select_box3');
        var select_box_element4 = document.querySelector('#select_box4');

        initSelectBox(select_box_element1);
        initSelectBox(select_box_element2);
        initSelectBox(select_box_element3);
        initSelectBox(select_box_element4);
    </script>
    <script src="{{ asset('js/location.js') }}"></script>
@endpush
