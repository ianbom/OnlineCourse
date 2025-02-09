<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            border: 10px solid gold;
        }
        h1 {
            font-size: 36px;
            color: #2c3e50;
        }
        h2 {
            font-size: 28px;
            margin: 10px 0;
        }
        .content {
            font-size: 20px;
            margin: 20px 0;
        }
        .footer {
            margin-top: 50px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>SERTIFIKAT PENGHARGAAN</h1>
    <h2>Diberikan kepada</h2>
    <h1><strong>{{ $user }}</strong></h1>
    <p class="content">Sebagai penghargaan atas keberhasilan dalam menyelesaikan kursus <strong>{{ $course }}</strong>.</p>
    <p class="footer">Diberikan pada tanggal: {{ $date }}</p>
</body>
</html>
