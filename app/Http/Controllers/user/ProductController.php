<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\WebSettings;
use App\Models\User;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;
class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::guard('user')->user();
        $data['web'] = webSettings::where('id', 1)->first();
        $data['user'] = User::where('id', $user->id)->get();
        $data['product'] = Product::all();
        return view('user.product.product-index',$data);
    }
}
