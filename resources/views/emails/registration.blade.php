<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivasi Akun Anda</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 20px;">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-radius: 8px; overflow: hidden; color: #333;">
    <!-- Header -->
    <tr>
        <td style="background-color: #BB363B; text-align: center; padding: 20px;">
            <img alt="Logo" src="{{ asset('assets/images/Bank_DKI_white_text.svg') }}" style="height: 30px; margin-bottom: 10px;">
            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">Aktivasi Akun Anda</h1>
        </td>
    </tr>
    <!-- Body -->
    <tr>
        <td style="background-color: #ffffff; padding: 20px;">
            <h2 style="color: #BB363B; margin-bottom: 10px;">Halo, {{ $user->name }}!</h2>
            <p style="margin: 0 0 15px;">Terima kasih telah mendaftar. Berikut adalah detail akun Anda:</p>
            <ul style="list-style: none; padding: 0; margin: 0 0 20px;">
                <li><strong>Username:</strong> {{ $user->username }}</li>
                <li><strong>Email:</strong> {{ $user->email }}</li>
            </ul>
            <p style="margin: 0 0 15px;">Untuk mengaktifkan akun Anda, silakan klik tautan berikut:</p>
            <a href="{{ $activationLink }}" style="display: inline-block; color: #ffffff; background-color: #BB363B; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                Aktivasi Akun
            </a>
            <p style="margin: 20px 0 0;">Atau, salin dan tempelkan tautan ini di browser Anda:</p>
            <p style="color: #666; word-break: break-word; margin: 0;">{{ $activationLink }}</p>
        </td>
    </tr>
    <!-- Footer -->
    <tr>
        <td style="background-color: #BB363B; text-align: center; padding: 10px;">
            <p style="color: #ffffff; font-size: 12px; margin: 0;">Tautan ini hanya berlaku selama 1 jam. Jika sudah kedaluwarsa, Anda perlu mendaftar ulang.</p>
            <p style="color: #ffffff; font-size: 12px; margin: 5px 0 0;">Salam hangat, Tim Kami</p>
        </td>
    </tr>
</table>
</body>
</html>
