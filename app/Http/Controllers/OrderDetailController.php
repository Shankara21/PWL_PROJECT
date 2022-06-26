<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Kendaraan;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
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
        // $date = date_create($request->tanggal_sewa);
        if (empty(Order::where('user_id', $request->user_id)->where('status', 0)->first())) {
            Order::insert([
                'user_id' => $request->user_id,
                'status' => 0
            ]);
        }
        $kendaraan = Kendaraan::find($request->kendaraan_id);
        $orderUserStatus = Order::where('user_id', $request->user_id)->where('status', 0)->first();
        $detailOrderId = OrderDetail::where('order_id', $orderUserStatus->id)->where('kendaraan_id', $kendaraan)->first();
        $addOrder = [];
        if (empty($detailOrderId)) {
            $addOrder = [
                'order_id' => $orderUserStatus->id,
                'kendaraan_id' => $kendaraan->id,
                'total_bayar' => $kendaraan->harga * $request->lama_sewa,
                'tanggal_sewa' => $request->tanggal_sewa,
                'opsi' => $request->opsi,
                'catatan' => $request->catatan,
            ];
            if ($request->lama_sewa != 0) {
                $addOrder['lama_sewa'] = $request->lama_sewa;
            } else {
                return redirect('/detail/' . $kendaraan->slug)->with('error', 'Lama Sewa tidak boleh 0');
            }
            OrderDetail::insert($addOrder);
        } else {
            $detailOrderId->harga_sewa += $kendaraan->harga * $request->lama_sewa;
            if ($request->lama_sewa != 0) {
                $detailOrderId->lama_sewa = $request->lama_sewa;
            } else {
                return redirect('/detail/' . $kendaraan->slug)->with('error', 'Lama Sewa tidak boleh 0');
            }
        }
        return redirect('/detail/' . $kendaraan->slug)->with('success', 'Berhasil menambahkan pesanan');

        // $validateData = $request->validate([
        //     'kendaraan_id' => 'required',
        //     'user_id' => 'required',
        //     'name' => 'required',
        //     'email' => 'required',
        //     'opsi' => 'required',
        //     'tanggal_sewa' => 'required',
        //     'lama_sewa' => 'required',
        //     'catatan' => 'required',
        // ]);

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
        return $request->all();
        dd($request->all());
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $validateData = $request->validate([
            'berkas' => 'image|file',
            'payment' => 'required',
            'bukti_pembayaran' => 'image|file',
        ]);
        $cek = $this->validate($request, [
            'berkas' => 'image|file',
            'payment' => 'required',
            'bukti_pembayaran' => 'image|file',
        ]);
        dd($cek);

        // dd($validateData);
        if ($request->file('berkas')) {
            $validateData['berkas'] = $request->file('berkas')->store('berkas', 'public');
        }
        if ($request->file('bukti_pembayaran')) {
            $validateData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }
        $order->status = 1;
        // dd($validateData);
        Order::where('user_id', Auth::user()->id)->update($validateData);
        return redirect('/cart')->with('success', 'Pembayaran berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetailId = OrderDetail::where('id', $orderDetail->id)->first();
        $orderId = Order::where('id', $orderDetailId->order_id)->first();
        // $orderId->total -= $orderDetailId->harga_sewa;
        // $orderId->update();
        $orderDelete = Order::where('status', 0)->first();

        $orderDetailId->delete();
        $orderDelete->delete();
        return redirect('/cart')->with('success', 'Berhasil menghapus pesanan');
    }
}
