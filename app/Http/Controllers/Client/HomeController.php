<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Client;
use App\Models\User;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('client')->user();
        return view('client.home-index');
    }
}
