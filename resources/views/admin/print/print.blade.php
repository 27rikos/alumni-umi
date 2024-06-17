<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kop Surat</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .kop-surat {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            flex: 1;
        }

        .header-right {
            flex: 3;
            text-align: left;
        }

        .logo {
            max-width: 100px;
            height: auto;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        p {
            margin: 2px 0;
            font-size: 14px;
        }

        hr {
            margin-top: 20px;
            border: 0;
            border-top: 1px solid #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        <div class="header-right">
            <h1>UNIVERSITAS METHODIST INDONESIA</h1>
            <p>Alamat: Jl. Hang Tuah No.8, Madras Hulu, Kec. Medan Polonia, Kota Medan, Sumatera Utara 20151</p>
            <p>Telepon: 0614157882 | Email: https://www.methodist.ac.id</p>
        </div>
    </div>
    <hr />
    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Peminatan</th>
                    <th>Stambuk</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($alumni as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->npm }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->prodis->prodi }}</td>
                        <td>{{ $item->minat->peminatan }}</td>
                        <td>{{ $item->stambuk }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
