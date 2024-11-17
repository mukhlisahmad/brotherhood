<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('user')->user();
        return view('user.home-index');
    }
}
