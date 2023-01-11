<?php

namespace App\Http\Controllers;

use App\Models\detailOrder;
// use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoredetailOrderRequest;
use App\Http\Requests\UpdatedetailOrderRequest;

class DetailOrderController extends Controller
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
     * @param  \App\Http\Requests\StoredetailOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredetailOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function show(detailOrder $detailOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(detailOrder $detailOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedetailOrderRequest  $request
     * @param  \App\Models\detailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedetailOrderRequest $request, detailOrder $detailOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detailOrder  $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(detailOrder $detailOrder)
    {
        //
    }

    public function makeOrder(Request $request)
    {
        return dd($request);
    }
}