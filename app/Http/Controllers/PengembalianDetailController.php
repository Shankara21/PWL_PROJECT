<?php

namespace App\Http\Controllers;

use App\Models\PengembalianDetail;
use App\Http\Requests\StorePengembalianDetailRequest;
use App\Http\Requests\UpdatePengembalianDetailRequest;

class PengembalianDetailController extends Controller
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
     * @param  \App\Http\Requests\StorePengembalianDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengembalianDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengembalianDetail  $pengembalianDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PengembalianDetail $pengembalianDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengembalianDetail  $pengembalianDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PengembalianDetail $pengembalianDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengembalianDetailRequest  $request
     * @param  \App\Models\PengembalianDetail  $pengembalianDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengembalianDetailRequest $request, PengembalianDetail $pengembalianDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengembalianDetail  $pengembalianDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengembalianDetail $pengembalianDetail)
    {
        //
    }
}
