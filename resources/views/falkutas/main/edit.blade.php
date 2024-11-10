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
                                        value="{{ $find->no_alumni }}">
                                </div>
                                <div class="mb-3">
                                    <label for="npm" class="form-label">NPM</label>
                                    <input type="text" class="form-control" id="npm" name="npm"
                                        value="{{ $find->npm }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $find->nama }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach (['Laki-Laki', 'Perempuan'] as $option)
                                            <option value="{{ $option }}"
                                                {{ $find->gender == $option ? 'selected' : '' }}>
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="provinsi" class="form-label">Provinsi</label>
                                                <select class="form-control" id="provinsi" name="provinsi">
                                                    <option value="{{ $find->provinsi }}">{{ $find->provinsi }}</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kota" class="form-label">Kota/Kabupaten</label>
                                                <select class="form-control" id="kota" name="kota">
                                                    <option value="{{ $find->kota }}">{{ $find->kota }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                                <select class="form-control" id="kecamatan" name="kecamatan">
                                                    <option value="{{ $find->kecamatan }}">{{ $find->kecamatan }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                                <select class="form-control" id="kelurahan" name="kelurahan">
                                                    <option value="{{ $find->kelurahan }}">{{ $find->kelurahan }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="stambuk" class="form-label">Stambuk</label>
                                    <input type="text" class="form-control" id="stambuk" name="stambuk"
                                        value="{{ $find->stambuk }}">
                                </div>
                                <div class="mb-3">
                                    <label for="peminatan" class="form-label">Peminatan</label>
                                    <select name="peminatan" id="peminatan" class="form-select">
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
                                    <select name="prodi" id="studi" class="form-select">
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
                                        value="{{ $find->thn_lulus }}">
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
                                    <select name="penguji1" id="select_box1" class="form-select">
                                        <option value="">Pilih Dosen Penguji 1</option>
                                        @foreach ($dosens as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $find->dosenpenguji1->nama == $item->nama ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="penguji2" class="form-label">Dosen Penguji 2</label>
                                    <select name="penguji2" id="select_box2" class="form-select">
                                        <option value="">Pilih Dosen Penguji 2</option>
                                        @foreach ($dosens as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $find->dosenpenguji2->nama == $item->nama ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
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
                                    <input type="date" class="form-control" id="sempro" name="sempro"
                                        value="{{ $find->sempro }}">
                                </div>
                                <div class="mb-3">
                                    <label for="semhas" class="form-label">Tanggal Seminar Hasil</label>
                                    <input type="date" class="form-control" id="semhas" name="semhas"
                                        value="{{ $find->semhas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="mejahijau" class="form-label">Tanggal Meja Hijau</label>
                                    <input type="date" class="form-control" id="mejahijau" name="mejahijau"
                                        value="{{ $find->mejahijau }}">
                                </div>
                                <div class="mb-3">
                                    <label for="yudisium" class="form-label">Yudisium</label>
                                    <input type="date" class="form-control" id="yudisium" name="yudisium"
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

    <script>
        $(document).ready(function() {
            const $provinsi = $('#provinsi');
            const $kota = $('#kota');
            const $kecamatan = $('#kecamatan');
            const $kelurahan = $('#kelurahan');

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

            // Load sub-regions based on parent (provinsi, kota, kecamatan)
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
                const provinsiValue = '{{ $find->provinsi }}';
                const kotaValue = '{{ $find->kota }}';
                const kecamatanValue = '{{ $find->kecamatan }}';
                const kelurahanValue = '{{ $find->kelurahan }}';

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

                        if (kotaValue) {
                            $.getJSON(
                                `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${selectedProvince.id}.json`,
                                function(kotas) {
                                    const selectedKota = kotas.find(kota => kota.name === kotaValue);
                                    if (selectedKota) {
                                        loadSubRegions(selectedKota.id, 'districts', $kecamatan,
                                            'Pilih Kecamatan', kecamatanValue);
                                    }

                                    if (kecamatanValue) {
                                        $.getJSON(
                                            `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${selectedKota.id}.json`,
                                            function(kecamatans) {
                                                const selectedKecamatan = kecamatans.find(kec => kec
                                                    .name === kecamatanValue);
                                                if (selectedKecamatan) {
                                                    loadSubRegions(selectedKecamatan.id, 'villages',
                                                        $kelurahan, 'Pilih Kelurahan',
                                                        kelurahanValue);
                                                }
                                            });
                                    }
                                });
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
                    $kecamatan.html('<option value="">Pilih Kecamatan</option>').prop('disabled', true);
                    $kelurahan.html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
                } else {
                    $kota.html('<option value="">Pilih Kota/Kabupaten</option>').prop('disabled', true);
                    $kecamatan.html('<option value="">Pilih Kecamatan</option>').prop('disabled', true);
                    $kelurahan.html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
                }
            });

            // Event listener for Kota
            $kota.on('change', function() {
                const kotaName = $(this).val();
                if (kotaName) {
                    const selectedProvinceId = $provinsi.find(':selected').data('id');
                    $.getJSON(
                        `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${selectedProvinceId}.json`,
                        function(kotas) {
                            const selectedKota = kotas.find(kota => kota.name === kotaName);
                            if (selectedKota) {
                                loadSubRegions(selectedKota.id, 'districts', $kecamatan,
                                    'Pilih Kecamatan');
                            }
                        });
                    $kelurahan.html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
                } else {
                    $kecamatan.html('<option value="">Pilih Kecamatan</option>').prop('disabled', true);
                    $kelurahan.html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
                }
            });

            // Event listener for Kecamatan
            $kecamatan.on('change', function() {
                const kecamatanName = $(this).val();
                if (kecamatanName) {
                    const selectedKotaId = $kota.find(':selected').data('id'); // Get the selected Kota ID
                    $.getJSON(
                        `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${selectedKotaId}.json`,
                        function(kecamatans) {
                            const selectedKecamatan = kecamatans.find(kec => kec.name ===
                                kecamatanName);
                            if (selectedKecamatan) {
                                loadSubRegions(selectedKecamatan.id, 'villages', $kelurahan,
                                    'Pilih Kelurahan');
                            }
                        });
                } else {
                    $kelurahan.html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
                }
            });

            // Initialize the selects with pre-filled data from the backend
            initializeSelects();
        });
    </script>
    <script>
        function initSelectBox(select_box_element) {
            dselect(select_box_element, {
                search: true
            });
        }

        // Inisialisasi untuk dua selectbox
        var select_box_element1 = document.querySelector('#select_box1');
        var select_box_element2 = document.querySelector('#select_box2');

        initSelectBox(select_box_element1);
        initSelectBox(select_box_element2);
    </script>
@endsection
