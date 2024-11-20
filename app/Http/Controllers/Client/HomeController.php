<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Auth;
use App\Models\Client;
use App\Models\Product;
use App\Models\WebSettings;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::guard('client')->user();
        $data['web'] = webSettings::where('id', 1)->first();
        $data['client'] = Client::where('id', $user->id)->get();
        $data['product'] = Product::all();
        return view('cliet.home-index',$data);
    }
    public function menu()
    {
        $user = Auth::guard('client')->user();
        $data['web'] = webSettings::where('id', 1)->first();
        $data['client'] = Client::where('id', $user->id)->get();
        $data['product'] = Product::all();
        return view('cliet.menu-index',$data);
    }
    public function profile()
    {
        $user = Auth::guard('client')->user();
        $data['web'] = webSettings::where('id', 1)->first();
        $data['client'] = Client::where('id', $user->id)->get();
        return view('cliet.profile-index',$data);
    }

}
