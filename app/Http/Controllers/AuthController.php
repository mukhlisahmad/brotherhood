<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Auth;
use Str;
use App\Models\WebSettings;
use App\Models\User;
use App\Models\Client;

use Alert;
class AuthController extends Controller
{
    public function Authview(Request $request)
    {
        if(Auth::guard('client')->check()){
            Alert::info('Informasi', 'Saat ini kamu telah login sebagai ' . Auth::guard('client')->user()->dsn_name);
            return redirect()->route('client.home-index');
        }
        if(Auth::guard('toko')->check()){
            Alert::info('Informasi', 'Saat ini kamu telah login sebagai ' . Auth::guard('toko')->user()->dsn_name);
            return redirect()->route('toko.home-index');
        }

        $data['web'] = webSettings::where('id', 1)->first();
        $data['title'] = "Login - " . ($data['web']->ecomerce ?? 'Tidak Ada Nama');
        return view('auth.login');
    }
    public function AuthSignInPost(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        $login = $request->input('login');
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            if (Toko::where('tko_email', $login)->exists()) {
                $fieldType = 'tko_email';
            } elseif (Client::where('cli_email', $login)->exists()) {
                $fieldType = 'cli_email';
            } else {
                $fieldType = 'email';
            }
        } elseif (preg_match('/^[0-9]{10,13}$/', $login)) {
            if (Toko::where('tko_no_telpon', $login)->exists()) {
                $fieldType = 'tko_no_telpon';
            } elseif (Client::where('cli_no_telpon', $login)->exists()) {
                $fieldType = 'cli_no_telpon';
            } else {
                $fieldType = 'no_telpon';
            }
        } else {
            $fieldType = 'unknown';
        }
        $user = null;
        $guard = null;
        if ($fieldType == 'email' || $fieldType == 'no_telpon') {
            $user = User::where($fieldType, $login)->first();
            $guard = 'web';
        } elseif ($fieldType == 'tko_no_telpon'|| $fieldType == 'tko_email') {
            $user = Toko::where($fieldType, $login)->first();
            $guard = 'toko';
        } elseif ($fieldType == 'cli_no_telpon'|| $fieldType == 'cli_email') {
            $user = Client::where($fieldType, $login)->first();
            $guard = 'client';
        }
        if (!$user) {
            Alert::error('Error', 'Akun tidak ditemukan');
            return back();
        }
        if (Auth::guard($guard)->attempt([$fieldType => $login, 'password' => $request->password])) {
            if ($guard == 'toko') {
                Alert::success('Success', 'Login Ke Toko anda');
                return redirect()->route('toko.home-index');
            } elseif ($guard == 'client') {
                Alert::success('Success', 'berhasil login silahkan berbelanja');
                return redirect()->route('client.home-index');
            } elseif ($guard == 'web') {
                Alert::success('Success', 'berhasil login');
                return redirect()->route('user.home-index');
            }
        } else {
            Alert::error('Error', 'Username atau password salah');
            return back();
        }
    }

    // forgot pw
    public function AuthForgotPage()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['title'] = "Forgot Password  - " . ($data['web']->ecomerce ?? 'Unknown name');
        $data['menu'] = "Halaman Forgot Password";

        return view('auth.auth-forgot', $data);
    }
}
