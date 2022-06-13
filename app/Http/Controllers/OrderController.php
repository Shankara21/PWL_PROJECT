<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('admin.order.index', [
            'orders' => $order
        ]);
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        // Menghitung selisih hari antara tanggal kembali dan tanggal sewa

        //!  Percobaan 1
        // $tgl_sewa = Carbon::parse($request->tanggal_sewa);
        // $tgl_kembali = Carbon::parse($request->tanggal_kembali);
        // $selisih = $tgl_kembali->diffInDays($tgl_sewa);

        //! Percobaan 2
        // $tanggal1 = new DateTime($request->tanggal_sewa);
        // $tanggal2 = new DateTime($request->tanggal_kembali);
        // $interval = $tanggal1->diff($tanggal2);
        // $kiw = $interval->format('%R%a Hari');
        // dd($interval);

        //! Percobaan 3 (Berhasil)
        $awal = date_create($request->tanggal_sewa);
        $akhir = date_create($request->tanggal_kembali);
        $diff = date_diff($akhir, $awal);

        // Menambah 12jam 
        $input = date('Y-m-d-H-i-s', strtotime($request->tanggal_sewa . '+12 hours'));



        // dd($awal);
        if ($akhir < $awal) {
            return 'Tanggal atau waktu tidak boleh kurang dari tanggal sewa';
        }
        $rules = [
            'payments' => 'required',
            'berkas' => 'image|file',
            'bukti_pembayaran' => 'image|file',
        ];
        $validatedata = $request->validate($rules);

        dd($validatedata);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $mainOrder = Order::find($order->id);
        $orderDetail = OrderDetail::where('order_id', $order->id)->first();
        return view('admin.order.show', [
            'order' => $mainOrder,
            'orderDetail' => $orderDetail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
