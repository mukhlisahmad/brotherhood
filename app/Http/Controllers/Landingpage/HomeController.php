<?php

namespace App\Http\Controllers\Landingpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebSettings;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['web'] = webSettings::where('id', 1)->first();
        $data['title'] = "";
        $data['menu'] = "Halaman Utama";
        return view('landingpage.home-index',$data);
    }
}
