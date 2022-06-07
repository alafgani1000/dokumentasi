<!DOCTYPE html>
<html>
<head>
    <title>Application</title>
</head>
<body>
    <h2>Verifikasi Email Kamu</h2>
    <h3>Hai {{ $name }}</h3>
    <p>Terimakasih sudah mendaftar, Tekan link dibawah sebelum 24 jam untuk memverifikasi akun kamu</p>
    <a href="{{ $link }}">{{ $link }}</a>
    <p>Thank you</p>
</body>
</html>
