$(document).ready(function () {
    const $provinsi = $('#provinsi');
    const $kota = $('#kota');
    const $kecamatan = $('#kecamatan');
    const $kelurahan = $('#kelurahan');

    // Function to fetch data and populate select
    function fetchAndPopulate(url, $selectElement, placeholder) {
        $selectElement.html(`<option value="">${placeholder}</option>`).prop('disabled', true);

        $.getJSON(url, function (data) {
            $.each(data, function (index, item) {
                $selectElement.append($('<option>', {
                    value: item.name,
                    text: item.name
                }));
            });
            $selectElement.prop('disabled', false);
        }).fail(function (jqxhr, textStatus, error) {
            console.error("Error fetching data:", textStatus, error);
        });
    }

    // Fetch Provinsi
    fetchAndPopulate('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', $provinsi, 'Pilih Provinsi');

    // Event listener for Provinsi
    $provinsi.on('change', function () {
        const provinsiName = $(this).val();
        if (provinsiName) {
            $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function (data) {
                const selectedProvince = data.find(province => province.name === provinsiName);
                if (selectedProvince) {
                    fetchAndPopulate(
                        `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${selectedProvince.id}.json`,
                        $kota, 'Pilih Kota/Kabupaten');
                }
            });
            $kecamatan.html('<option value="">Pilih Kecamatan</option>');
            $kelurahan.html('<option value="">Pilih Kelurahan</option>');
        } else {
            $kota.html('<option value="">Pilih Kota/Kabupaten</option>').prop('disabled', true);
            $kecamatan.html('<option value="">Pilih Kecamatan</option>').prop('disabled', true);
            $kelurahan.html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
        }
    });

    // Event listener for Kota
    $kota.on('change', function () {
        const kotaName = $(this).val();
        if (kotaName) {
            const provinsiName = $provinsi.val();
            $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function (provinces) {
                const selectedProvince = provinces.find(province => province.name === provinsiName);
                if (selectedProvince) {
                    $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${selectedProvince.id}.json`, function (regencies) {
                        const selectedKota = regencies.find(kota => kota.name === kotaName);
                        if (selectedKota) {
                            fetchAndPopulate(
                                `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${selectedKota.id}.json`,
                                $kecamatan, 'Pilih Kecamatan');
                        }
                    });
                }
            });
            $kelurahan.html('<option value="">Pilih Kelurahan</option>');
        } else {
            $kecamatan.html('<option value="">Pilih Kecamatan</option>').prop('disabled', true);
            $kelurahan.html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
        }
    });

    // Event listener for Kecamatan
    $kecamatan.on('change', function () {
        const kecamatanName = $(this).val();
        if (kecamatanName) {
            const kotaName = $kota.val();
            const provinsiName = $provinsi.val();
            $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function (provinces) {
                const selectedProvince = provinces.find(province => province.name === provinsiName);
                if (selectedProvince) {
                    $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${selectedProvince.id}.json`, function (regencies) {
                        const selectedKota = regencies.find(kota => kota.name === kotaName);
                        if (selectedKota) {
                            $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${selectedKota.id}.json`, function (districts) {
                                const selectedKecamatan = districts.find(kecamatan => kecamatan.name === kecamatanName);
                                if (selectedKecamatan) {
                                    fetchAndPopulate(
                                        `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${selectedKecamatan.id}.json`,
                                        $kelurahan, 'Pilih Kelurahan');
                                }
                            });
                        }
                    });
                }
            });
        } else {
            $kelurahan.html('<option value="">Pilih Kelurahan</option>').prop('disabled', true);
        }
    });
});
