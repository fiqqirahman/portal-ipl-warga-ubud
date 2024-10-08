<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterVendorRequest;
use App\Mail\ForgotPasswordMail;
use App\Mail\RegistrationMail;
use App\Models\User;
use App\Statics\User\NRIK;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Welcome'
        ];

        return view('landing-page.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function registrasi()
    {
        $data = [
            'title' => 'Registrasi'
        ];

        return view('landing-page.registrasi-v1', $data);
    }

    public function registerVendor(RegisterVendorRequest $request)
    {
        try {
            $createdAt = User::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count() + 1;
            $username = '9999' . str_pad($createdAt, 6, "0", STR_PAD_LEFT);
            $password = $request->input('password');
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($password),
                'username' => $username,
                'created_by' => Auth::id(),
                'expired_password' => Carbon::now()->addMonths(),
            ]);

            if ($request->id_role == 3) {
                $user->assignRole(3);
            } else {
                $user->assignRole($request->id_role);
            }

            Mail::to($user->email)->send(new RegistrationMail($user, $password));

            sweetAlert('success','Registrasi berhasil. Silakan cek email Anda');
            return to_route('landing-page.registrasi');
        } catch (\Exception $e) {
            sweetAlertException('Terjadi Kesalahan, hubungi Administrator!', $e);

            return redirect()->back()->with('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.')->withInput();
        }
    }

    public function loginSubmitVendor(Request $request)
    {
        $recentIpAddress = $_SERVER['REMOTE_ADDR'];
        $max_fail = 3;
        $expiredPassword = '1970-01-01';
        $request['username'] = strtoupper($request->username);
        $user = User::where('username', $request->username)->first();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ], [], [
            'username' => 'Username',
            'password' => 'Password',
        ]);

        if (!empty($user) && $user->is_blokir == 1) {
            return redirect()->back()->withInput()->withErrors(["Akun anda terblokir karena sudah {$max_fail} kali melakukan kesalahan"]);
        }

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) { //berhasil login
            // berhasil login
            // create session browser
            $sessionId = bin2hex(random_bytes(40));

            // update IP Address
            User::where('username', $request->username)->update([
                'ip_address' => $recentIpAddress,
                'session_id' => $sessionId,
            ]);

            Session::put('errorLogin', 0);
            Session::put('session_browser', $sessionId);

            return redirect(route('index'));
        } else { //jika salah password / keblokir
            if (Session::get('errorLogin') !== null) {
                $sessionErrorLogin = Session::get('errorLogin') + 1;
                $sessionErrorLoginUsername = Session::get('errorLoginUsername');
                Session::put('errorLogin', $sessionErrorLogin);

                if ($request->username === 'DE' . NRIK::$DEVELOPER) {
                    $expiredPassword = Carbon::now()->addMonths(1);
                }

                // jika yg login sekarang berbeda dengan yg login sebelumnya, session error login kembalikan ke 1
                if ($request->username != $sessionErrorLoginUsername) {
                    Session::put('errorLogin', 1);
                }

                if ($sessionErrorLogin >= $max_fail && $sessionErrorLoginUsername == $request->username) {
                    //cek username ada / tidak di DB
                    $isUsernameExists = User::where('username', $request->username)->exists();
                    if ($isUsernameExists) {
                        User::where('username', $request->username)->update([
                            'password' => bcrypt(Hash::make(rand(1000000000, 9999999999))),
                            'expired_password' => $expiredPassword,
                            'is_blokir' => '1'
                        ]);
                        return redirect()->back()->withInput()->withErrors(["Akun anda terblokir karena sudah {$max_fail} kali melakukan kesalahan"]);
                    } else {
                        return redirect()->back()->withInput()->withErrors(["Akun tidak ditemukan"]);
                    }
                }
                Session::put('errorLoginUsername', $request->username);
            } else {
                Session::put('errorLogin', 1);
                Session::put('errorLoginUsername', $request->username);
                $sessionErrorLogin = Session::get('errorLogin');
            }

            return redirect()->back()->withInput()->withErrors(["Username atau password salah"]);
        }
    }

    public function logout()
    {
        if (isset(auth()->user()->id)) {
            // update IP Address
            $id = auth()->user()->id;
            $ipAddress = NULL;
            User::where('id', $id)->update([
                'ip_address' => $ipAddress
            ]);

            Session::flush();
            Auth::logout();
        }

        return Redirect(route('auth.login'));
    }
}
