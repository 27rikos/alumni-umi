<!DOCTYPE html>
<html>

<body>

</body>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Alamat</th>
            <th>Kode Pos</th>
            <th>Kewarganegaraan</th>
            <th>Nomor HP</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Semester Masuk</th>
            <th>Tanggal Masuk</th>
            <th>Program Studi</th>
            <th>Fakultas</th>
            <th>Tahun Masuk</th>
            <th>Kelas</th>
            <th>Asal Sekolah</th>
            <th>Kategori Mahasiswa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td data-format="0">{{ $item->npm }}</td>
                <td>{{ $item->nama }}</td>
                <td data-format="0">{{ $item->nik }}</td>
                <td>{{ $item->gender }}</td>
                <td>{{ $item->tempat_lhr }}</td>
                <td>{{ $item->tanggal_lhr ? \Carbon\Carbon::parse($item->tanggal_lhr)->translatedFormat('d F Y') : '-' }}
                </td>
                <td>{{ $item->provinsi }}</td>
                <td>{{ $item->kota }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->pos ?? '-' }}</td>
                <td>{{ $item->kewarganegaraan }}</td>
                <td>{{ $item->hp ?? '-' }}</td>
                <td>{{ $item->telp ?? '-' }}</td>
                <td>{{ $item->email ?? '-' }}</td>
                <td>{{ $item->masuk }}</td>
                <td>{{ $item->tanggal_masuk ? \Carbon\Carbon::parse($item->tanggal_masuk)->translatedFormat('d F Y') : '-' }}
                </td>
                <td>{{ $item->prodi_mahasiswa->prodi }}</td>
                <td>{{ $item->fakultas }}</td>
                <td>{{ $item->tahun_masuk }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->asal }}</td>
                <td>{{ $item->kategori ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</html>
