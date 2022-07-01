<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderDetail;
use App\Models\Pengembalian;
use App\Models\PengembalianDetail;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = OrderDetail::latest();
        if (request('search')) {
            $order->where('tanggal_sewa', 'like', '%' . request('search') . '%');
        }

        return view('admin.order.index', [
            'orders' => $order->get(),
            'title' => 'Order',
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
        $pengembalian = Pengembalian::where('order_id', $mainOrder->id)->first();
        if ($pengembalian) {
            $pengembalianDetail = PengembalianDetail::where('pengembalian_id', $pengembalian->id)->first();
        } else {
            $pengembalianDetail = null;
        }

        // dd($pengembalianDetail);
        return view('admin.order.show', [
            'order' => $mainOrder,
            'orderDetail' => $orderDetail,
            'pengembalian' => $pengembalian,
            'pengembalianDetail' => $pengembalianDetail,
            'title' => 'Detail Order',
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

    public function cetak_pdf()
    {
        $key = OrderDetail::all();
        $pdf = PDF::loadview('admin.order.order_pdf', [
            'orderDetails' => $key,
            // 'title' => 'Export PDF',
        ])->setPaper('a4', 'portrait');
        return $pdf->download('GO Rent - Laporan Penyewaan.pdf');
    }
}
