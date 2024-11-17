<?php

namespace App\Http\Controllers;

use App\Models\Landingpage;
use App\Http\Requests\StoreLandingpageRequest;
use App\Http\Requests\UpdateLandingpageRequest;
use App\Models\Client;
use App\Models\Toko;

class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['landingpage'] = Landingpage::all();
        $data['toko'] = Toko::all();
        $data['client'] = Client::all();
        return view('landingpage.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLandingpageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Landingpage $landingpage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Landingpage $landingpage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLandingpageRequest $request, Landingpage $landingpage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Landingpage $landingpage)
    {
        //
    }
}
