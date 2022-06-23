<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Models\Bank;
use App\Models\OrderDetail;

class checkoutController extends Controller
{
    public function create(OrderDetail $orderDetail)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $orderDetail = OrderDetail::where('order_id', $order->id)->get();
        return view('homepage.checkout', [
            'orderDetail' => $orderDetail,
            'order' => Order::where('user_id', Auth::user()->id)->where('status', 0)->first(),
            'banks' => Bank::all(),
            'title' => 'Checkout',
        ]);
    }

    public function store(StoreOrderDetailRequest $request, $id)
    {
        // dd($request->all());
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $validatedData = $request->validate([
            'berkas' => 'image|file',
            'bukti_pembayaran' => 'image|file',
        ]);
        $orderr = $request->validate([
            'bank_id' => 'required',
        ]);
        if ($request->file('berkas')) {
            $validatedData['berkas'] = $request->file('berkas')->store('berkas', 'public');
        }
        if ($request->file('bukti_pembayaran')) {
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }
        OrderDetail::where('order_id', $order->id)->update($validatedData);
        $orderr['status'] = $order->status = 1;
        Order::where('id', $order->id)->update($orderr);
        return redirect('/cart')->with('success', 'Pembayaran berhasil');
    }
}
