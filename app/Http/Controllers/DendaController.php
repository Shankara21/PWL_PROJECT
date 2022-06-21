<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDendaRequest;
use App\Http\Requests\UpdateDendaRequest;

class DendaController extends Controller
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
     * @param  \App\Http\Requests\StoreDendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDendaRequest $request)
    {
        $orderDetail = OrderDetail::find($request->orderDetail);
        $order = Order::find($orderDetail->order_id);
        $validateData = $request->validate([
            'bank_id' => 'required',
            'bukti_pembayaran' => 'image|file',
            'total' => 'required',
        ]);
        $validateData['user_id'] = Auth::user()->id;
        $validateData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('denda', 'public');
        Denda::create($validateData);

        $denda = Denda::latest()->first();
        $orderDetail->tanggal_kembali = $request->tanggal_kembali;
        $orderDetail->denda_id = $denda->id;
        $orderDetail->update();

        $order->status = 2;
        $order->update();
        return redirect('/history');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function show(Denda $denda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function edit(Denda $denda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDendaRequest  $request
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDendaRequest $request, Denda $denda)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denda $denda)
    {
        //
    }
}
