@extends('Partials.AdminDashboard')
@section('title', 'Tambah Mahasiswa')
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
                                Data Mahasiswa
                            </h2>

                            <!-- Breadcrumb positioned to the right -->
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kelola Mahasiswa</li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Mahasiswa</li>
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
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary ms-auto"><i
                            class="fa-solid fa-arrow-left me-2"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="text" class="form-control" id="npm" name="npm">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik">
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
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="kota" class="form-label">Kota/Kabupaten</label>
                                                <select class="form-control select_box" id="kota" name="kota"
                                                    disabled>
                                                    <option value="">Pilih Kota/Kabupaten</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-group mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-select">
                                        <option value="">Pilih</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pos" class="form-label">Kode Pos</label>
                                    <input type="number" name="pos" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="hp" class="form-label">Nomor HP</label>
                                    <input type="number" name="hp" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="telp" class="form-label">Nomor Telephone</label>
                                    <input type="number" name="telp" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="masuk" class="form-label">Semester Masuk</label>
                                    <select name="masuk" id="masuk" class="form-select">
                                        <option value="">Pilih Semester</option>
                                        <option value="GANJIL">Ganjil</option>
                                        <option value="GENAP">Genap</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                    <input type="date" name="tanggal_masuk" class="form-control">
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
                                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                    <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk">
                                </div>
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-select">
                                        <option value="">Pilih Kelas</option>
                                        <option value="PAGI">Pagi</option>
                                        <option value="SIANG">Siang</option>
                                        <option value="SORE">Sore</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="kategori" class="form-label">Kategori Mahasiswa</label>
                                    <select name="kategori" id="kategori" class="form-select">
                                        <option value="">Pilih Kategori Mahasiswa</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->kategori }}">{{ $item->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="asal" class="form-label">Asal Sekolah</label>
                                    <input type="text" class="form-control" id="asal" name="asal">
                                </div>
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
    <script src="{{ asset('js/location.js') }}"></script>
@endpush
