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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Mahasiswa</li>
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
                    <form action="{{ route('mahasiswa.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="text" class="form-control" id="npm" name="npm"
                                        value="{{ $data->npm }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $data->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        value="{{ $data->nik }}">
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach (['Laki-Laki', 'Perempuan'] as $item)
                                            <option value="{{ $item }}"
                                                {{ $data->gender == $item ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lhr" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr"
                                        value="{{ $data->tempat_lhr }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lhr" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lhr" name="tanggal_lhr"
                                        value="{{ $data->tanggal_lhr }}">
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
                                        <textarea name="alamat" id="" cols="30" rows="5" class="form-control">{{ $data->alamat }}</textarea>
                                    </div>
                                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-select">
                                        <option value="">Pilih</option>
                                        @foreach (['WNI', 'WNA'] as $item)
                                            <option
                                                value="{{ $item }}"{{ $data->kewarganegaraan == $item ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pos" class="form-label">Kode Pos</label>
                                    <input type="number" name="pos" class="form-control"
                                        value="{{ $data->pos }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="hp" class="form-label">Nomor HP</label>
                                    <input type="number" name="hp" class="form-control"
                                        value="{{ $data->hp }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="telp" class="form-label">Nomor Telephone</label>
                                    <input type="number" name="telp" class="form-control"
                                        value="{{ $data->telp }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $data->email }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="masuk" class="form-label">Semester Masuk</label>
                                    <select name="masuk" id="masuk" class="form-select">
                                        <option value="">Pilih Semester</option>
                                        @foreach (['GANJIL', 'GENAP'] as $item)
                                            <option
                                                value="{{ $item }}"{{ $data->masuk == $item ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                                    <input type="date" name="tanggal_masuk" class="form-control"
                                        value="{{ $data->tanggal_masuk }}">
                                </div>
                                <div class="mb-3">
                                    <label for="studi" class="form-label">Program Studi</label>
                                    <select name="prodi" id="studi" class="form-select">
                                        <option value="">Pilih Program Studi</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $data->prodi ? 'selected' : '' }}>{{ $item->prodi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="fakultas" class="form-label">Fakultas</label>
                                    <select name="fakultas" id="fakultas" class="form-select">
                                        <option value="">Pilih Fakultas</option>
                                        @foreach (['Fakultas Ilmu Komputer', 'Fakultas Kedokteran', 'Fakultas Sastra', 'Fakultas Ekonomi', 'Fakultas Pertanian'] as $option)
                                            <option value="{{ $option }}"
                                                {{ $data->fakultas == $option ? 'selected' : '' }}>
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                                    <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk"
                                        value="{{ $data->tahun_masuk }}">
                                </div>
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-select">
                                        <option value="">Pilih Kelas</option>
                                        @foreach (['PAGI', 'SIANG', 'SORE'] as $item)
                                            <option
                                                value="{{ $item }}"{{ $data->kelas == $item ? 'selected' : '' }}>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="kategori" class="form-label">Kategori Mahasiswa</label>
                                    <select name="kategori" id="kategori" class="form-select">
                                        <option value="">Pilih Kategori Mahasiswa</option>
                                        @foreach ($kategori as $item)
                                            <option
                                                value="{{ $item->kategori }}"{{ $item->kategori == $data->kategori ? 'selected' : '' }}>
                                                {{ $item->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="asal" class="form-label">Asal Sekolah</label>
                                    <input type="text" class="form-control" id="asal" name="asal"
                                        value="{{ $data->asal }}">
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
    <script>
        $(document).ready(function() {
            const $provinsi = $('#provinsi');
            const $kota = $('#kota');

            // Function to fetch data and populate select
            function fetchAndPopulate(url, $selectElement, placeholder, selectedValue = '') {
                $.getJSON(url, function(data) {
                    let options = `<option value="">${placeholder}</option>`;
                    $.each(data, function(index, item) {
                        options +=
                            `<option value="${item.name}" data-id="${item.id}" ${item.name === selectedValue ? 'selected' : ''}>${item.name}</option>`;
                    });
                    $selectElement.html(options).prop('disabled', false); // Ensure select is enabled
                }).fail(function(jqxhr, textStatus, error) {
                    console.error("Error fetching data:", textStatus, error);
                });
            }

            // Load sub-regions based on parent (provinsi, kota)
            function loadSubRegions(parentId, endpoint, $childSelect, placeholder, selectedValue = '') {
                const url = `https://www.emsifa.com/api-wilayah-indonesia/api/${endpoint}/${parentId}.json`;
                fetchAndPopulate(url, $childSelect, placeholder, selectedValue);
            }

            // Load provinces first
            function loadProvinces(provinsiValue = '') {
                fetchAndPopulate('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', $provinsi,
                    'Pilih Provinsi', provinsiValue);
            }

            // Initialize with pre-filled values
            function initializeSelects() {
                const provinsiValue = '{{ $data->provinsi }}';
                const kotaValue = '{{ $data->kota }}';

                // Load provinces with the default value
                loadProvinces(provinsiValue);

                if (provinsiValue) {
                    $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function(
                    provinces) {
                        const selectedProvince = provinces.find(prov => prov.name === provinsiValue);
                        if (selectedProvince) {
                            loadSubRegions(selectedProvince.id, 'regencies', $kota, 'Pilih Kota/Kabupaten',
                                kotaValue);
                        }
                    });
                }
            }

            // Event listener for Provinsi
            $provinsi.on('change', function() {
                const provinsiName = $(this).val();
                if (provinsiName) {
                    $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function(
                        data) {
                        const selectedProvince = data.find(prov => prov.name === provinsiName);
                        if (selectedProvince) {
                            loadSubRegions(selectedProvince.id, 'regencies', $kota,
                                'Pilih Kota/Kabupaten');
                        }
                    });
                } else {
                    $kota.html('<option value="">Pilih Kota/Kabupaten</option>').prop('disabled', true);
                }
            });

            // Initialize the selects with pre-filled data from the backend
            initializeSelects();
        });
    </script>
@endpush
