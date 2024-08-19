<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Keterangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 10px;
        }
        .kop-surat {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2{
            text-align: center;
        }
        .kop-surat img {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }
        .kop-surat h1 {
            font-size: 24px;
            margin: 0;
        }
        .kop-surat p {
            margin: 0;
            font-size: 14px;
        }
        .table-borderless {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        .table-borderless td {
            padding: 5px 10px;
            border: none;
        }
        .table-borderless td:first-child {
            width: 30%;
        }
        .table-borderless td:nth-child(2) {
            width: 5%;
            text-align: center;
        }
        .content {
            margin-bottom: 60px;
        }
        .signature {
            width: 100%;
            margin-top: 60px;
            text-align: center;
        }
        .signature div {
            display: inline-block;
            width: 48%;
            text-align: center;
            vertical-align: top;
        }
        .signature div .name-line {
            margin-top: 100px; /* Space for signature */
            border-top: 1px solid #000;
            width: 60%;
            margin: 20px auto 0;
        }
        .signature div .role {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="kop-surat">
        <h1>UNIVERSITAS METHODIST INDONESIA</h1>
        <p>Alamat: Jl. Hang Tuah No.8, Madras Hulu, Kec. Medan Polonia, Kota Medan, Sumatera Utara 20151</p>
        <p>Telepon: 0614157882 | Email: https://www.methodist.ac.id</p>
        <hr style="border: 1px solid #000;">
    </div>

    <div class="container">
        <div class="header text-center">
            <h2>Surat Keterangan</h2>
        </div>

        <div class="content">
            <p>Mahasiswa dengan data sebagai berikut:</p>

            <table class="table-borderless">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <td>NPM</td>
                        <td>:</td>
                        <td>{{ $data->npm }}</td>
                    </tr>
                    <tr>
                        <td>Program Studi</td>
                        <td>:</td>
                        <td>{{ $data->prodis->prodi }}</td>
                    </tr>
                    <tr>
                        <td>Fakultas</td>
                        <td>:</td>
                        <td>{{ $data->falkutas }}</td>
                    </tr>
                </tbody>
            </table>

            <p>
                Telah melakukan pengisian data Alumni (Yudisium dan Wisuda) dan telah diverifikasi oleh Admin Fakultas dan Ka.Prodi untuk kebenaran dan validitasnya.
            </p>

            <p>
                Demikian surat keterangan ini diperbuat untuk dipergunakan sebagai syarat mendaftar Meja Hijau.
            </p>

            <div class="signature">
                <div>
                    <div class="role">Diperiksa oleh<br>Admin Fakultas</div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="name-line"></div>
                </div>
                <div>
                    <div class="role">Mengetahui<br>Prodi</div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="name-line"></div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
