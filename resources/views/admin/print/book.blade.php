<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Wisuda</title>
</head>

<body>
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Alumni</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Tanggal Lulus</th>
                    <th>IPK</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Judul Skripsi</th>
                </tr>
            </thead>
            @php
                use Carbon\Carbon;
            @endphp

            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_alumni }}</td>
                        <td>{{ $item->npm }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tempat_lhr }}</td>
                        <td>{{ $item->tanggal_lhr ? Carbon::parse($item->tanggal_lhr)->translatedFormat('d F Y') : '-' }}
                        </td>
                        <td>{{ $item->provinsi }},{{ $item->kota }},{{ $item->kecamatan }},{{ $item->kelurahan }}</td>
                        <td>{{ $item->yudisium ? Carbon::parse($item->yudisium)->translatedFormat('d F Y') : '-' }}
                        <td>{{ $item->ipk }}</td>
                        <td>{{ $item->ayah }}</td>
                        <td>{{ $item->ibu }}</td>
                        <td>{{ $item->judul }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
