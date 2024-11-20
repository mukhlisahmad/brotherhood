<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Auth;
use Str;
use Hash;
use App\Models\WebSettings;
use App\Models\User;
use App\Models\Client;
use RealRashid\SweetAlert\Facades\Alert;
class AuthController extends Controller
{
    public function Authview(Request $request)
    {
        if(Auth::guard('client')->check()){
            Alert::info('Informasi', 'Saat ini kamu telah login sebagai ' . Auth::guard('client')->user()->dsn_name);
            return redirect()->route('client.home-index');
        }

        $data['web'] = webSettings::where('id', 1)->first();
        $data['menu'] = "Halaman Login";
        $data['title'] = "Login";
        return view('auth.login',$data);
    }
    public function AuthSignInPost(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        $login = $request->input('login');
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            if (Client::where('cli_email', $login)->exists()) {
                $fieldType = 'cli_email';
            } else {
                $fieldType = 'email';
            }
        } else {
            $fieldType = 'unknown';
        }
        $user = null;
        $guard = null;
        if ($fieldType == 'email') {
            $user = User::where($fieldType, $login)->first();
            $guard = 'web';
        } elseif ($fieldType == 'cli_email') {
            $user = Client::where($fieldType, $login)->first();
            $guard = 'client';
        }
        if (!$user) {
            Alert::error('Error', 'Akun tidak ditemukan');
            return back();
        }
        if (Auth::guard($guard)->attempt([$fieldType => $login, 'password' => $request->password])) {
            if ($guard == 'client') {
                Alert::success('Success', 'Sukses Login');
                return redirect()->route('client.home-index');
            } elseif ($guard == 'web') {
                Alert::success('Success', 'Login sebagai Admin');
                return redirect()->route('user.home-index');
            }
        } else {
            Alert::error('Error', 'Email atau password salah');
            return back();
        }
    }
    public function RegisterView()
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['title'] = "register";
        $data['menu'] = "Halaman register";

        return view('auth.register', $data);

    }

    public function AuthRegisterPost(Request $request)
    {
        $user = new Client;

        $request->validate([
            'cli_name' => 'required|string|max:255',
            'cli_no_telpon' => 'required|numeric',
            'cli_email' => 'required|email|max:255',
            'password' => 'nullable|string',
            'password_confirm' => 'nullable|string|same:password',
        ]);
        $user->cli_name = $request->cli_name;
        $user->cli_no_telpon = $request->cli_no_telpon;
        $user->cli_email = $request->cli_email;
        $user->cli_code = Str::random(6);
        $user->password = Hash::make($request->password);
        $user->save();
        Alert::success('Success', 'Data berhasil ditambahkan');
        return back();
    }
    public function logout(Request $request) {
        if (Auth::guard('client')->check()) {
            Auth::guard('client')->logout();
        }
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Alert::success('Success', 'Anda berhasil logout');
        return redirect()->route('auth.login');
    }
}
