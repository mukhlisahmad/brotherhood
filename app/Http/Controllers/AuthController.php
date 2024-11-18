<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Auth;
use Str;
use App\Models\WebSettings;
use App\Models\User;
use App\Models\Client;

class AuthController extends Controller
{
    public function Authview(Request $request)
    {

        $data['web'] = webSettings::where('id', 1)->first();

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
        } elseif (preg_match('/^[0-9]{10,13}$/', $login)) {
            if (Client::where('cli_no_telpon', $login)->exists()) {
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
        } elseif ($fieldType == 'cli_no_telpon'|| $fieldType == 'cli_email') {
            $user = Client::where($fieldType, $login)->first();
            $guard = 'client';
        }
        if (!$user) {

            return back();
        }
        if (Auth::guard($guard)->attempt([$fieldType => $login, 'password' => $request->password])) {
            if ($guard == 'toko') {

                return redirect()->route('toko.home-index');
            } elseif ($guard == 'client') {

                return redirect()->route('client.home-index');
            } elseif ($guard == 'web') {

                return redirect()->route('user.home-index');
            }
        } else {

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
