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
        @if ($alumni->status ?? null == 1)
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <div>
                    Data Anda telah disetujui oleh admin, sehingga Anda tidak dapat mengubahnya lagi.
                </div>
            </div>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <form action="{{ isset($alumni) ? route('Daftar.update', $alumni->id) : route('Daftar.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($alumni))
                            @method('put')
                        @endif
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
                                        @foreach (['Laki-Laki', 'Perempuan'] as $option)
                                            <option value="{{ $option }}"
                                                {{ isset($alumni->gender) && $alumni->gender == $option ? 'selected' : '' }}>
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lhr" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lhr" name="tempat_lhr"
                                        value="{{ isset($alumni->tempat_lhr) ? $alumni->tempat_lhr : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lhr" class="form-label">Tanggal
                                        Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lhr" name="tanggal_lhr"
                                        value="{{ isset($alumni->tanggal_lhr) ? $alumni->tanggal_lhr : '' }}">
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
                                    <input type="text" class="form-control" id="stambuk" name="stambuk"
                                        value="{{ isset($alumni->stambuk) ? $alumni->stambuk : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="peminatan" class="form-label">Peminatan</label>
                                    <select name="peminatan" id="peminatan" class="form-select">
                                        <option value="">Pilih Peminatan</option>
                                        @foreach ($peminatan as $item)
                                            <option value="{{ $item->id }}"
                                                {{ isset($alumni->peminatan) && $alumni->peminatan == $item->id ? 'selected' : '' }}>
                                                {{ $item->peminatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="studi" class="form-label">Program Studi</label>
                                    <select name="prodi" id="studi" class="form-select">
                                        <option value="">Pilih Program Studi</option>
                                        @foreach ($prodi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ isset($alumni->prodi) && $alumni->prodi == $item->id ? 'selected' : '' }}>
                                                {{ $item->prodi }}
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
                                                {{ isset($alumni->fakultas) && $alumni->fakultas == $option ? 'selected' : '' }}>
                                                {{ $option }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik"
                                        value="{{ isset($alumni->nik) ? $alumni->nik : '' }}">
                                </div>

                                <div class="mb-3">
                                    <label for="ktp" class="form-label">KTP</label>
                                    <input type="file" class="form-control" id="ktp" accept="image/*"
                                        name="ktp">
                                    @if (isset($alumni->ktp))
                                        <div>
                                            <img id="ktp-preview" src="{{ asset('images/ktp/' . $alumni->ktp) }}"
                                                class="rounded mt-2 img-fluid" alt="KTP Preview"
                                                style="width: 200px; height: auto;">
                                        </div>
                                    @else
                                        <div>
                                            <img id="ktp-preview" src="" class="rounded mt-2 img-fluid"
                                                alt="KTP Preview" style="display: none; width: 200px; height: auto;">
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="ijazah" class="form-label">Ijazah</label>
                                    <input type="file" class="form-control" id="ijazah" accept="image/*"
                                        name="ijazah">
                                    @if (isset($alumni->ijazah))
                                        <div>
                                            <img id="ijazah-preview"
                                                src="{{ asset('images/ijazah/' . $alumni->ijazah) }}"
                                                class="rounded mt-2 img-fluid" alt="Ijazah Preview"
                                                style="width: 200px; height: auto;">
                                        </div>
                                    @else
                                        <div>
                                            <img id="ijazah-preview" src="" class="rounded mt-2 img-fluid"
                                                alt="Ijazah Preview" style="display: none; width: 200px; height: auto;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pembimbing1" class="form-label">Dosen Pembimbing 1</label>
                                    <select name="pembimbing1" id="select_box1" class="form-select">
                                        <option value="">Pilih Dosen Pembimbing 1</option>
                                        @foreach ($dosens as $item)
                                            <option value="{{ $item->id }}"
                                                {{ isset($alumni->pembimbing1) && $alumni->pembimbing1 == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pembimbing2" class="form-label">Dosen Pembimbing 2</label>
                                    <select name="pembimbing2" id="select_box2" class="form-select">
                                        <option value="">Pilih Dosen Pembimbing 2</option>
                                        @foreach ($dosens as $item)
                                            <option value="{{ $item->id }}"
                                                {{ isset($alumni->pembimbing2) && $alumni->pembimbing2 == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="penguji1" class="form-label">Dosen Penguji 1</label>
                                    <select name="penguji1" id="select_box3" class="form-select">
                                        <option value="">Pilih Dosen Penguji 1</option>
                                        @foreach ($dosens as $item)
                                            <option value="{{ $item->id }}"
                                                {{ isset($alumni->penguji1) && $alumni->penguji1 == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="penguji2" class="form-label">Dosen Penguji 2</label>
                                    <select name="penguji2" id="select_box4" class="form-select">
                                        <option value="">Pilih Dosen Penguji 2</option>
                                        @foreach ($dosens as $item)
                                            <option value="{{ $item->id }}"
                                                {{ isset($alumni->penguji2) && $alumni->penguji2 == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ayah" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="ayah" name="ayah"
                                        value="{{ isset($alumni->ayah) ? $alumni->ayah : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="ibu" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="ibu" name="ibu"
                                        value="{{ isset($alumni->ibu) ? $alumni->ibu : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="sempro" class="form-label">Tanggal Seminar Proposal</label>
                                    <input type="date" class="form-control" id="sempro" name="sempro"
                                        value="{{ isset($alumni->sempro) ? $alumni->sempro : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="semhas" class="form-label">Tanggal Seminar Hasil</label>
                                    <input type="date" class="form-control" id="semhas" name="semhas"
                                        value="{{ isset($alumni->semhas) ? $alumni->semhas : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="mejahijau" class="form-label">Tanggal Meja Hijau</label>
                                    <input type="date" class="form-control" id="mejahijau" name="mejahijau"
                                        value="{{ isset($alumni->mejahijau) ? $alumni->mejahijau : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="yudisium" class="form-label">Yudisium</label>
                                    <input type="date" class="form-control" id="yudisium" name="yudisium"
                                        value="{{ isset($alumni->yudisium) ? $alumni->yudisium : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Skripsi</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ isset($alumni->judul) ? $alumni->judul : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Foto Alumni <span class="text-danger ms-1">(
                                            Nama Foto : NIM-Nama )</span> </label>
                                    <input type="file" class="form-control" id="image-input" accept="image/*"
                                        name="file">
                                </div>
                                @if (isset($alumni->file))
                                    <div>
                                        <img id="image-preview" src="{{ asset('images/alumni/' . $alumni->file) }}"
                                            class="rounded mt-2 img-fluid" alt="Image Preview"
                                            style="width: 200px; height: auto;">
                                    </div>
                                @else
                                    <div>
                                        <img id="image-preview" src="" class="rounded mt-2 img-fluid"
                                            alt="Image Preview" style="display: none; width: 200px; height: auto;">
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary" {{ $alumni->status ?? null == 1 ? 'disabled hidden' : '' }}
                                type="submit">Simpan</button>
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
                const provinsiValue = "{{ isset($alumni->provinsi) ? $alumni->provinsi : '' }}";
                const kotaValue = "{{ isset($alumni->kota) ? $alumni->kota : '' }}";
                const kecamatanValue = "{{ isset($alumni->kecamatan) ? $alumni->kecamatan : '' }}";
                const kelurahanValue = "{{ isset($alumni->kelurahan) ? $alumni->kelurahan : '' }}";

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
@endpush
