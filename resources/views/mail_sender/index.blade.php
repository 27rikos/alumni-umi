<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['subject'] ?? 'Pemberitahuan Penting' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            font-size: 0.8em;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $data['subject'] ?? 'Pemberitahuan Penting' }}</h1>
        </div>
        <div class="content">
            <p>Halo {{ $data['name'] ?? 'Pengguna' }},</p>

            <p>{{ $data['message'] ?? 'Ini adalah email pemberitahuan penting dari sistem kami.' }}</p>

            @if (isset($data['additional_info']))
                <p>{{ $data['additional_info'] }}</p>
            @endif

            <p>Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami.</p>

            <p>Terima kasih,<br>Tim Kami</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Nama Perusahaan Anda. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
