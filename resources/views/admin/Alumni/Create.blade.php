@extends('Partials.AdminDashboard')
@section('title', 'tambah alumni')
@section('content')
    <div class="main">
        <div class="card shadow mb-4 my-2 my-3">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Alumni</h6>
                <a href="{{ route('alumni.index') }}" class="btn btn-primary btn-icon-split btn-sm  ml-auto">
                    <span class="icon text-white-50">
                        <i class="fa-solid fa-arrow-left"></i>
                    </span>
                    <span class="text">Kembali</span>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Existing form fields -->
                            <div class="form-group">
                                <label for="npm">No Alumni</label>
                                <input type="text" class="form-control" id="no_alumni" name="no_alumni">
                            </div>
                            <div class="form-group">
                                <label for="npm">NPM</label>
                                <input type="text" class="form-control" id="npm" name="npm">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lhr">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lhr">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lhr" name="tanggal_lhr">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="stambuk">Stambuk</label>
                                <input type="text" class="form-control" id="stambuk" name="stambuk">
                            </div>
                            <div class="form-group">
                                <label for="peminatan">Peminatan</label>
                                <select name="peminatan" id="peminatan" class="form-control">
                                    <option value="">--Pilih--</option>
                                    @foreach ($peminatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->peminatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="studi">Program Studi</label>
                                <select name="prodi" id="studi" class="form-control">
                                    <option value="">--Pilih--</option>
                                    @foreach ($prodi as $item)
                                        <option value="{{ $item->id }}">{{ $item->prodi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="falkutas">Falkutas</label>
                                <select name="falkutas" id="falkutas" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="Falkutas Ilmu Komputer">Falkutas Ilmu Komputer</option>
                                    <option value="Falkutas Kedokteran">Falkutas Kedokteran</option>
                                    <option value="Falkutas Sastra">Falkutas Sastra</option>
                                    <option value="Falkutas Pertanian">Falkutas Pertanian</option>
                                    <option value="Falkutas Ekonomi">Falkutas Ekonomi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lulus">Tahun Lulus*</label>
                                <input type="text" class="form-control" id="lulus" name="thn_lulus">
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik">
                            </div>
                            <div class="form-group">
                                <label for="ktp">KTP</label>
                                <input type="file" class="form-control-file" id="ktp" accept="image/*"
                                    name="ktp">
                                <img id="ktp-preview" src="" class="rounded mt-2" alt="KTP Preview"
                                    style="display:none; width: 200px; height: auto;" />
                            </div>
                            <div class="form-group">
                                <label for="ijazah">Ijazah</label>
                                <input type="file" class="form-control-file" id="ijazah" accept="image/*"
                                    name="ijazah">
                                <img id="ijazah-preview" src="" class="rounded mt-2" alt="Ijazah Preview"
                                    style="display:none; width: 200px; height: auto;" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="penguji1">Dosen Penguji 1</label>
                                <input type="text" class="form-control" id="penguji1" name="penguji1">
                            </div>
                            <div class="form-group">
                                <label for="penguji2">Dosen Penguji 2</label>
                                <input type="text" class="form-control" id="penguji2" name="penguji2">
                            </div>
                            <!-- Existing form fields continued -->
                            <div class="form-group">
                                <label for="ipk">IPK</label>
                                <input type="text" class="form-control" id="ipk" name="ipk">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                            </div>
                            <div class="form-group">
                                <label for="ayah">Nama Ayah</label>
                                <input type="text" class="form-control" id="ayah" name="ayah">
                            </div>
                            <div class="form-group">
                                <label for="ibu">Nama Ibu</label>
                                <input type="text" class="form-control" id="ibu" name="ibu">
                            </div>
                            <div class="form-group">
                                <label for="sempro">Tanggal Seminar Proposal</label>
                                <input type="date" class="form-control" id="sempro" name="sempro">
                            </div>
                            <div class="form-group">
                                <label for="semhas">Tanggal Seminar Hasil</label>
                                <input type="date" class="form-control" id="semhas" name="semhas">
                            </div>
                            <div class="form-group">
                                <label for="mejahijau">Tanggal Meja Hijau</label>
                                <input type="date" class="form-control" id="mejahijau" name="mejahijau">
                            </div>
                            <div class="form-group">
                                <label for="yudisium">Yudisium</label>
                                <input type="date" class="form-control" id="yudisium" name="yudisium">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul Skripsi</label>
                                <input type="text" class="form-control" id="judul" name="judul">
                            </div>
                            <div class="form-group">
                                <label for="file" class="mb-3">Foto Alumni</label>
                                <input type="file" class="form-control-file" id="image-input" accept="image/*"
                                    name="file">
                            </div>
                            <img id="image-preview" src="" class="rounded" alt="Image Preview"
                                style="display:none; width: 200px; height: auto;" />
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
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
