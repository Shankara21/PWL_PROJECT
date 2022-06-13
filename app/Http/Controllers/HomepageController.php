<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Kendaraan;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function home()
    {
        $kendaraan = Kendaraan::where('id', '2')->orWhere('id', '19')->orWhere('id', '22')->orWhere('id', '31')->orWhere('id', '32')->orWhere('id', '41')->get();
        return view('homepage.index', [
            'kendaraan' => $kendaraan,
            'title' => 'Home',
        ]);
    }

    public function show(Kendaraan $kendaraan)
    {
        $main = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $dengan_sopir = $kendaraan->harga + 50000;
        $sopir_bbm = $kendaraan->harga + 100000;

        return view('homepage.details', [
            'kendaraan' => $kendaraan,
            'title' => 'Details ' . $kendaraan->name,
            'status' => $main,
            'dengan_sopir' => $dengan_sopir,
            'sopir_bbm' => $sopir_bbm,
        ]);
    }
    public function service()
    {
        return view('homepage.service', [
            'title' => 'Service',
        ]);
    }
    public function about()
    {
        return view('homepage.about', [
            'title' => 'About',
        ]);
    }
    public function project()
    {

        $kendaraan = Kendaraan::latest();
        // $kiw = Kendaraan::join('brands', 'brands.id', '=', 'kendaraans.brand_id')->where('kendaraans.nama', 'like', '%' . request('search') . '%')->get();

        if (request('search')) {
            $kendaraan->where('nama', 'like', '%' . request('search') . '%');
        }

        return view('homepage.project', [
            'kendaraan' => $kendaraan->paginate(6),
            'title' => 'Collection',
        ]);
    }
    public function team()
    {
        return view('homepage.team', [
            'title' => 'Team',
        ]);
    }
    public function contact()
    {
        return view('homepage.contact', [
            'title' => 'Contact',
        ]);
    }
    public function testimonial()
    {
        $testimoni = Testimoni::all();
        return view('homepage.testimonial', [
            'title' => 'Testimonial',
            'testimoni' => $testimoni,
        ]);
    }
    public function cart()
    {
        return view('homepage.cart', [
            'title' => 'Cart',
        ]);
    }
    public function checkout()
    {
        $order = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();
        $orderDetail = OrderDetail::where('order_id', $order->id)->first();
        return view('homepage.checkout', [
            'title' => 'Checkout',
            'order' => $order,
            'orderDetail' => $orderDetail,
        ]);
    }
    public function onProcess()
    {
        // $order = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();
        // $orderDetail = OrderDetail::where('order_id', $order->id)->first();
        return view('homepage.onProcess', [
            'title' => 'Checkout',
            // 'order' => $order,
            // 'orderDetail' => $orderDetail,
        ]);
    }
    public function history()
    {
        // $order = Order::where('user_id', auth()->user()->id)->where('status', 0)->first();
        // $orderDetail = OrderDetail::where('order_id', $order->id)->first();
        return view('homepage.history', [
            'title' => 'History',
            // 'order' => $order,
            // 'orderDetail' => $orderDetail,
        ]);
    }
}
