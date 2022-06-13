<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreOrderDetailRequest;

class checkoutController extends Controller
{
    public function store(StoreOrderDetailRequest $request, $id)
    {

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $validatedData = $request->validate([
            'payment' => 'required',
            'berkas' => 'image|file',
            'bukti_pembayaran' => 'image|file',
        ]);
        if ($request->file('berkas')) {
            $validatedData['berkas'] = $request->file('berkas')->store('berkas', 'public');
        }
        if ($request->file('bukti_pembayaran')) {
            $validatedData['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }
        $validatedData['status'] = $order->status = 1;
        Order::where('user_id', Auth::user()->id)->update($validatedData);
        return redirect('/cart')->with('success', 'Pembayaran berhasil');
    }
}
