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
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Falkutas</th>
                    <th>Prodi</th>
                    <th>Peminatan</th>
                    <th>Stambuk</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->npm }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->falkutas }}</td>
                        <td>{{ $item->prodis->prodi }}</td>
                        <td>{{ $item->minat->peminatan }}</td>
                        <td>{{ $item->stambuk }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
    </html>
