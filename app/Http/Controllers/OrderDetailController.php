<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;

class OrderDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreOrderDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderDetailRequest $request)
    {
        //! Percobaan 3 (Berhasil)
        $awal = date_create($request->tanggal_sewa);
        $akhir = date_create($request->tanggal_kembali);
        $diff = date_diff($akhir, $awal);

        $durasi = $request->lama_sewa * 24;
        // Menambah 12jam 
        $input = date('Y-m-d-H-i-s', strtotime($request->tanggal_sewa . '+' . $durasi . 'hours'));



        // dd($awal);
        if ($akhir < $awal) {
            return 'Tanggal atau waktu tidak boleh kurang dari tanggal sewa';
        }

        $validateData = $request->validate([
            'kendaraan_id' => 'required',
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'opsi' => 'required',
            'tanggal_sewa' => 'required',
            'lama_sewa' => 'required',
            'catatan' => 'required',
        ]);

        dd($validateData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderDetailRequest  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
