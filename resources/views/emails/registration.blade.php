<!DOCTYPE html>
<html>
<head>
    <title>Aktivasi Akun Anda</title>
</head>
<body>
<h2>Halo, {{ $user->name }}!</h2>

<p>Terima kasih telah mendaftar. Berikut adalah detail akun Anda:</p>

<ul>
    <li><strong>Username:</strong> {{ $user->username }}</li>
    <li><strong>Email:</strong> {{ $user->email }}</li>
{{--    <li><strong>Password Sementara:</strong> {{ $password }}</li>--}}
</ul>

<p>Untuk mengaktifkan akun Anda, silakan klik tautan berikut:</p>
<p>
    <a href="{{ $activationLink }}" style="color: #fff; background-color: #007bff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
        Aktivasi Akun
    </a>
</p>

<p>Atau, salin dan tempelkan tautan ini di browser Anda:</p>
<p>{{ $activationLink }}</p>

<p><strong>Catatan:</strong> Tautan ini hanya berlaku selama 1 jam. Setelah itu, token akan kedaluwarsa, dan Anda perlu mendaftar ulang.</p>

<p>Salam hangat,</p>
<p>Tim Kami</p>
</body>
</html>
