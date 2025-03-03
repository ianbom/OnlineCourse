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
    border: 10px solid #d4af37;
    border-radius: 24px;
    background-color: #f8f8f2;
    position: relative;
}
/* body::before {
    content: "★";
    font-size: 40px;
    color: #d4af37;
    font-family: Arial, sans-serif;
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
} */



.nama {
    font-size: 24px;
    font-weight: bold;
    color: #000;
    position: relative;
    display: inline-block;
    background: linear-gradient(90deg, rgba(255, 215, 0, 0.3), rgba(255, 215, 0, 0.7));
    border-radius: 8px;
}

.nama::after {
    content: "";
    display: block;
    width: 100%;
    height: 4px;
    background-color: #d4af37;
    margin-top: 5px;
    border-radius: 2px;
}


        h1 {
            font-size: 50px;
            font-weight: bold;
            margin: 10px 0;
            color: #000;
        }
        h2 {
            font-size: 36px;
            font-weight: normal;
            color: #333;
        }
        h5 {
            font-size: 30px;
            font-weight: normal;
            color: #000;
        }
        .nama {
            font-size: 46px;
            font-weight: bold;
            color: #000;
        }
        .deskripsi {
            font-size: 24px;
            color: #444;
        }
        .footer {
            margin-top: 30px;
            font-size: 20px;
            color: #666;
            font-style: italic;

        }
    </style>
</head>
<body>
    <h1>SERTIFIKAT KEPESERTAAN</h1>
        <h2>Diberikan kepada</h2>
        <p class="nama">{{ $user }}</p>
        <p class="deskripsi">Atas Kesuksesannya Menyelesaikan Kelas</p>
        <h5>{{ $course }}</h5>
        <p class="footer">Diberikan oleh <strong>Shae Life</strong> pada tanggal {{ $date }}</p>
</body>
</html>
