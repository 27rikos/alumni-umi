@extends('Partials.Person')
@section('title', 'Registrasi Alumni')
@section('content')

    <div class="container-xl min-vh-100">
        <div class="py-5">
            <div class="container">
                <h3 class="display-6">Petunjuk Registrasi Alumni:</h3>
                <ol>
                    <li>Isi setiap field input pada form pengisian data</li>
                    <li>Isi semua inputan yang bertanda <span class="text-danger">*</span></li>
                    <li>Format foto yang dapat diupload: JPG, JPEG, PNG.</li>
                    <li>Ukuran maksimal foto: 2MB.</li>
                </ol>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form action="{{ route('Daftar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3" hidden>
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="text" class="form-control" readonly id="npm" name="npm"
                                        value="{{ $data->npm }}">
                                </div>
                                <div class="mb-3" hidden>
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" readonly id="nama" name="nama"
                                        value="{{ $data->name }}">
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
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
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
                                    <label for="fakultas" class="form-label">Falkutas</label>
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
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                                </div>
                            </div>
                            <div class="col-md-6">
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
