@extends('Partials.Person')
@section('title', 'Registrasi Alumni')
@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-5">Petunjuk Registrasi Alumni : </h3>
            <ol>
                <li>Isi setiap field input pada form pengisian data</li>
                <li>Isi semua inputan yang bertanda <span class="text-danger">*</span></li>
                <li>Format foto yang dapat diupload: JPG, JPEG, PNG.</li>
                <li>Ukuran maksimal foto: 2MB.</li>

            </ol>
        </div>
    </div>
    <div class="main">
        <div class="card shadow mb-4 my-2 my-3">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Registrasi
                </h6>
            </div>
            <div class="card-body">
                <form action="{{ route('Daftar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" hidden>
                                <label for="npm">NPM</label>
                                <input type="text" class="form-control" readonly id="npm" name="npm" value="{{ $data->npm }}">
                            </div>
                            <div class="form-group" hidden>
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" readonly id="nama" name="nama" value="{{ $data->name }}">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lhr">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr" >
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lhr">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lhr" name="tanggal_lhr" >
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="stambuk">Stambuk</label>
                                <input type="text" class="form-control" id="stambuk" name="stambuk" >
                            </div>
                            <div class="form-group">
                                <label for="peminatan">Peminatan</label>
                                <select name="peminatan" id="peminatan" class="form-control" >
                                    <option value="">--Pilih--</option>
                                    @foreach ($peminatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->peminatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="studi">Program Studi</label>
                                <select name="prodi" id="studi" class="form-control" >
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
                                    <option value="Falkutas pertanian">Falkutas Pertanian</option>
                                    <option value="Falkutas Ekonomi">Falkutas Ekonomi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" >
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ayah">Nama Ayah</label>
                                <input type="text" class="form-control" id="ayah" name="ayah" >
                            </div>
                            <div class="form-group">
                                <label for="ibu">Nama Ibu</label>
                                <input type="text" class="form-control" id="ibu" name="ibu" >
                            </div>
                            <div class="form-group">
                                <label for="sempro">Tanggal Seminar Proposal</label>
                                <input type="date" class="form-control" id="sempro" name="sempro" >
                            </div>
                            <div class="form-group">
                                <label for="semhas">Tanggal Seminar Hasil</label>
                                <input type="date" class="form-control" id="semhas" name="semhas" >
                            </div>
                            <div class="form-group">
                                <label for="mejahijau">Tanggal Meja Hijau</label>
                                <input type="date" class="form-control" id="mejahijau" name="mejahijau" >
                            </div>
                            <div class="form-group">
                                <label for="yudisium">Yudisium</label>
                                <input type="date" class="form-control" id="yudisium" name="yudisium" >
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul Skripsi</label>
                                <input type="text" class="form-control" id="judul" name="judul">
                            </div>
                            <div class="form-group">
                                <label for="file" class="mb-3">Foto Alumni</label>
                                <input type="file" class="form-control-file" id="image-input" accept="image/*" name="file">
                            </div>
                            <img id="image-preview" src="" class="rounded" alt="Image Preview" style="display:none; width: 200px; height: auto;" />
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
