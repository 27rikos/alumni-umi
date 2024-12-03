<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Keterangan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 40px;
            /* Adjusted padding for official letter spacing */
            margin: 0;
            color: #333;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 30px;
        }

        .kop-surat img {
            width: 80px;
            height: auto;
            margin-bottom: 10px;
        }

        .kop-surat h1 {
            font-size: 24px;
            margin: 0;
            color: #2b3e50;
        }

        .kop-surat p {
            margin: 0;
            font-size: 14px;
            color: #2b3e50;
        }

        .table-borderless {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        .table-borderless td {
            padding: 8px 15px;
            /* Adjusted padding for better alignment */
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
            margin-bottom: 40px;
            /* Reduced margin for better spacing */
        }

        .signature {
            width: 100%;
            margin-top: 40px;
            /* Increased space for signature section */
            text-align: center;
        }

        .signature div {
            display: inline-block;
            width: 48%;
            text-align: center;
            vertical-align: top;
        }

        .signature div .name-line {
            margin-top: 120px;
            border-top: 1px solid #000;
            width: 60%;
            margin: 20px auto 0;
        }

        .signature div .role {
            margin-top: 10px;
        }

        .signature div .role.mb-12 {
            margin-bottom: 48px;
        }

        .text-center {
            text-align: center;
        }

        .font-semibold {
            font-weight: 500;
        }

        .m-0 {
            margin: 0;
        }

        .mt-4 {
            margin-top: 16px;
        }

        .mb-4 {
            margin-bottom: 16px;
        }

        .border-b {
            border-bottom: 1px solid #000;
        }

        .inline-block {
            display: inline-block;
        }

        .w-48 {
            width: 48%;
        }

        .w-60 {
            width: 60%;
        }

        .text-sm {
            font-size: 14px;
        }

        .p-2 {
            padding: 8px;
        }

        .margin-end {
            margin-inline-end: 20px;
        }

        /* Added styles for aligning date and location to the right */
        .location-date {
            text-align: right;
            margin-top: 20px;
            font-size: 16px;
            /* Increased font size for location and date */
        }

        /* Custom Colors */
        .kop-surat h1 {
            color: #1f2937;
            /* Dark Gray */
        }

        .kop-surat p {
            color: #6b7280;
            /* Light Gray */
        }

        .content p {
            color: #374151;
            /* Darker Gray */
        }

        .location-date p {
            color: #374151;
            /* Darker Gray */
        }

        .signature .role {
            color: #1f2937;
            /* Dark Gray for roles */
        }

        .signature .name-line {
            border-top: 1px solid #1f2937;
            /* Dark Gray line for signatures */
        }
    </style>
</head>

<body>

    <div class="kop-surat">
        <h1 class="text-center font-semibold">UNIVERSITAS METHODIST INDONESIA</h1>
        <p class="text-center text-sm">Alamat: Jl. Hang Tuah No.8, Madras Hulu, Kec. Medan Polonia, Kota Medan, Sumatera
            Utara 20151</p>
        <p class="text-center text-sm">Telepon: 0614157882 | Email: https://www.methodist.ac.id</p>
        <hr class="border-b">
    </div>

    <div class="container">
        <div class="header text-center">
            <h2 class="font-semibold">Surat Keterangan</h2>
        </div>

        <div class="content">
            <p class="mb-4">Mahasiswa dengan data sebagai berikut:</p>

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
                        <td>{{ $data->fakultas }}</td>
                    </tr>
                </tbody>
            </table>

            <p class="mb-4">
                Telah melakukan pengisian data Alumni dan telah diverifikasi oleh Admin Fakultas dan Ka.Prodi untuk
                kebenaran dan validitasnya.
            </p>

            <p class="mb-4">
                Demikian surat keterangan ini diperbuat untuk dipergunakan sebagai syarat untuk pengambilan ijazah.
            </p>

            <!-- Right-aligned location and date -->
            <div class="location-date">
                <p>Medan, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            </div>

            <div class="signature">
                <div class="inline-block w-48">
                    <div class="role font-semibold mb-12">Diperiksa oleh<br>Admin Fakultas</div>
                    <div class="name-line"></div>
                </div>
                <div class="inline-block w-48">
                    <div class="role font-semibold mb-12">Mengetahui<br>Prodi</div>
                    <div class="name-line"></div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
