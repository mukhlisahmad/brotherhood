<?php

namespace App\Http\Controllers\Toko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('toko')->user();
        return view('toko.home-index');
    }
}
