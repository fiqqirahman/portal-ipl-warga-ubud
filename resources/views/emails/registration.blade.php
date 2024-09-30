<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Berhasil</title>
</head>
<body>
<h1>Selamat, Registrasi Berhasil!</h1>
<p>Halo {{ $user->name }},</p>
<p>Terima kasih telah mendaftar. Berikut adalah detail akun Anda:</p>

<p><strong>Username:</strong> {{ $user->username }}</p>
<p><strong>Password:</strong> {{ $password }}</p>

<p>Anda sekarang dapat login menggunakan email dan password yang Anda masukkan.</p>

<p>Terima kasih!</p>
</body>
</html>
