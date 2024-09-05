<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Excel</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>No Alumni</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Falkutas</th>
                <th>Prodi</th>
                <th>Peminatan</th>
                <th>Stambuk</th>
                <th>Tanggal Seminar Proposal</th>
                <th>Tanggal Seminar Hasil</th>
                <th>Tanggal Meja Hijau</th>
                <th>Tanggal Yudisium</th>
                <th>Tahun Lulus</th>
                <th>Judul Skripsi</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Dosen Penguji 1</th>
                <th>Dosen Penguji 2</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_alumni }}</td>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->falkutas }}</td>
                    <td>{{ $item->prodis->prodi }}</td>
                    <td>{{ $item->minat->peminatan }}</td>
                    <td>{{ $item->stambuk }}</td>
                    <td>{{ $item->sempro }}</td>
                    <td>{{ $item->semhas }}</td>
                    <td>{{ $item->mejahijau }}</td>
                    <td>{{ $item->yudisium }}</td>
                    <td>{{ $item->thn_lulus }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->ayah }}</td>
                    <td>{{ $item->ibu }}</td>
                    <td>{{ $item->penguji1 }}</td>
                    <td>{{ $item->penguji2 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
