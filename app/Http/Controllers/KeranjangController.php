<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\keranjang;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StorekeranjangRequest;
use App\Http\Requests\UpdatekeranjangRequest;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorekeranjangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekeranjangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekeranjangRequest  $request
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekeranjangRequest $request, keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(keranjang $keranjang)
    {
        keranjang::destroy($keranjang->id);
        return redirect("editPesanan");
    }

    public function destroy1(keranjang $keranjang)
    {
        keranjang::destroy($keranjang->id);
        return redirect("pesanan");
    }

    public function itemChecker(item $item)
    {
        // $keranjang = keranjang::class();

    }
}