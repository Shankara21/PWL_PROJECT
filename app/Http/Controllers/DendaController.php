<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDendaRequest;
use App\Http\Requests\UpdateDendaRequest;
use App\Models\Kendaraan;
use App\Models\Pengembalian;
use App\Models\PengembalianDetail;

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
        $orderDetail = OrderDetail::where('order_id', $request->orderDetail)->first();
        $order = Order::where('id', $request->orderDetail)->where('status', 1)->first();

        $kendaraan = Kendaraan::where('id', $orderDetail->kendaraan_id)->first();

        //! Membuat Denda terlebih dahulu 
        $validateData = $request->validate([
            'bukti_pembayaran' => 'image|file',
            'total' => 'required',
            'bank_id' => 'required'
        ]);
        if ($request->file('bukti_pembayaran')) {
            $validateData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_denda', 'public');
        }
        $validateData['user_id'] = Auth::user()->id;
        $validateData['order_detail_id'] = $orderDetail->id;

        Denda::create($validateData);

        $denda = Denda::where('order_detail_id', $order->id)->first();

        //! Membuat data pada Pengembalian
        $pengembalian = new Pengembalian;
        $pengembalian->user_id = Auth::user()->id;
        $pengembalian->order_id = $order->id;
        $pengembalian->bank_id = $request->bank_id;
        $pengembalian->denda_id = $denda->id;
        $pengembalian->save();

        //! Membuat  data di Pengembalian Details
        $dataPengembalian = Pengembalian::where('order_id', $order->id)->first();
        $pengembalianDetail = new PengembalianDetail;
        $pengembalianDetail->pengembalian_id = $dataPengembalian->id;
        $pengembalianDetail->tanggal_kembali = $request->tanggal_kembali;
        $pengembalianDetail->save();

        //! Update pada Denda 
        $dataPengembalianDetail = PengembalianDetail::where('pengembalian_id', $dataPengembalian->id)->first();
        $denda->pengembalianDetail_id = $dataPengembalianDetail->id;
        $denda->update();

        //! update status pada Order
        $order->status = 2;
        $order->update();

        //! Mengembalikan Stock pada kendaraan yang sudah di kembalikan
        $ubahStock = 1;
        Kendaraan::where('id', $kendaraan->id)->update(['stock' => $ubahStock]);

        return redirect('/history')->with('success', 'Pembayaran denda berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function show(Denda $denda)
    {
        dd($denda);
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
