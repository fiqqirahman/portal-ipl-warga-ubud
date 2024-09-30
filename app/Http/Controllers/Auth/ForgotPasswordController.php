<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    /**
     * Menampilkan form untuk meminta link reset password.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Mengirimkan link reset password ke email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        try {
// Validasi input email
            $request->validate([
                'email' => 'required|email|exists:users,email'
            ]);

            // Mencari pengguna berdasarkan email
            $user = User::where('email', $request->email)->first();

            // Membuat token reset password
            $token = Str::random(60);

            // Simpan token reset password di database
            DB::table('password_resets')->updateOrInsert(
                ['email' => $user->email],
                [
                    'email' => $user->email,
                    'token' => Hash::make($token),
                    'created_at' => Carbon::now()
                ]
            );

            Mail::send('emails.password', ['token' => $token], function($message) use ($user) {
                $message->to($user->email);
                $message->subject('Reset Password Notification');
            });

            sweetAlert('success','Password reset link has been sent to your email!');
            return back()->with('status', 'Password reset link has been sent to your email!');
        } catch (\Exception $e){
            sweetAlertException('Error sending password reset link:', $e);

            return back()->withErrors(['email' => 'An error occurred while sending the reset password link. Please try again later.']);
        }

    }

    /**
     * Menampilkan form reset password.
     *
     * @param string $token
     * @return \Illuminate\View\View
     */
    public function showResetForm($token)
    {
        return view('auth.reset', ['token' => $token]);
    }

    /**
     * Mereset password pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetPassword(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required|confirmed|min:8',
                'token' => 'required'
            ]);

            // Cek token di tabel password_resets
            $passwordReset = DB::table('password_resets')
                ->where('email', $request->email)
                ->first();

            if (!$passwordReset || !Hash::check($request->token, $passwordReset->token)) {
                return back()->withErrors(['email' => 'Invalid token']);
            }

            // Update password pengguna
            $user = User::where('email', $request->email)->first();
            $user->update(['password' => Hash::make($request->password)]);

            // Hapus token reset password dari database
            DB::table('password_resets')->where('email', $request->email)->delete();

            sweetAlert('success','Password has been reset successfully!');
            return redirect()->route('auth.login')->with('status', 'Password has been reset successfully!');
        } catch (\Exception $e){
            sweetAlertException('Error resetting password:', $e);
            return back()->withErrors(['email' => 'An error occurred while resetting the password. Please try again later.']);
        }

    }
}
