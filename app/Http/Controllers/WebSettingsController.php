<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreWebSettingsRequest;
use App\Http\Requests\UpdateWebSettingsRequest;
use App\Models\WebSettings;
use App\Models\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
class WebSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::guard('user')->user();
        $data['user'] = User::where('id', $user->id)->get();
        $data['web'] = webSettings::where('id', 1)->first();
        $data['title'] = "websettings";
        $data['menu'] = "Halaman Setting web";
        return view('root.settings-index', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWebSettingsRequest $request, WebSettings $webSettings)
    {
        //
    }


}
