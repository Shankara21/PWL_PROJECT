<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Bank;
use App\Models\User;
use App\Models\Brand;
use App\Models\Denda;
use App\Models\Order;
use App\Models\Category;
use App\Models\Kendaraan;
use App\Models\Testimoni;
use App\Models\OrderDetail;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use App\Models\PengembalianDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $orderDetails = OrderDetail::where('kendaraan_id', $kendaraan->id)->first();
        return view('homepage.details', [
            'kendaraan' => $kendaraan,
            'title' => 'Details ' . $kendaraan->name,
            'status' => $main,
            'dengan_sopir' => $dengan_sopir,
            'sopir_bbm' => $sopir_bbm,
            'orderDetails' => $orderDetails,
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
        // $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->orWhere('status', 1)->first();
        // $orderDetail = OrderDetail::where('order_id', $order->id)->first();

        // $cek = $orderDetail->kendaraan_id;
        if (request('search')) {
            $kendaraan->where('nama', 'like', '%' . request('search') . '%');
        }

        return view('homepage.project', [
            'kendaraan' => $kendaraan->paginate(6),
            'title' => 'Collection',
            // 'cek' => OrderDetail::where('order_id', $order->id)->first()
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
            'banks' => Bank::all(),
        ]);
    }

    public function onProcess()
    {
        // $data = [
        //     'order' => $this->Order->allData()
        // ];
        // $order = Order::where('user_id', auth()->user()->id)->where('status', 1)->get();
        $orderDetails = OrderDetail::all();
        // $orderDetail = OrderDetail::where('order_id', $order->id)->first();
        // $order = \App\Models\Order::where('user_id', Auth::user()->id)->where('status', 1)->get();
        // $length = $order->count();
        // if (!empty($order)) {
        //     for ($i = 0; $i < $length - 1; $i++) {
        //         $orderDetails = \App\Models\OrderDetail::where('order_id', $order[$i]->id)->get();
        //     }
        // }
        // $tes = OrderDetail::where('order_id', $order[0]->id)->all();
        // dd($tes->harga_sewa);
        return view('homepage.onProcess', [
            'title' => 'Checkout',
            'orderDetails' => $orderDetails,
            // 'order' => $order,
            // 'orderDetail' => $orderDetail,
        ]);
    }
    public function history()
    {
        // $order = Order::where('user_id', auth()->user()->id)->get();
        // $orderDetail = OrderDetail::where('order_id', $order->id)->first();
        $orderDetails = OrderDetail::all();
        return view('homepage.history', [
            'title' => 'History',
            // 'order' => $order,
            'orderDetails' => $orderDetails,
        ]);
    }
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('homepage.profile', [
            'user' => $user,
            'title' => 'Profile',

        ]);
    }
    public function details($id)
    {
        $orderDetails = OrderDetail::where('order_id', $id)->first();
        $pengembalian = Pengembalian::where('order_id', $id)->first();
        $pengembalianDetails = PengembalianDetail::where('pengembalian_id', $pengembalian->id)->first();
        $denda = Denda::where('order_detail_id', $orderDetails->id)->first();
        $selisih = '';
        $durasi = $orderDetails->lama_sewa * 24;
        $jangka = date('Y-m-d', strtotime($orderDetails->tanggal_sewa . '+' . $durasi . 'hours'));
        if ($denda) {
            $tgl_kembali = Carbon::parse($denda->pengembalianDetail->tanggal_kembali);
            $selisih = $tgl_kembali->diffInDays($jangka);
        }
        return view('homepage.details-history', [
            'title' => 'Details',
            'orderDetails' => $orderDetails,
            'pengembalian' => $pengembalian,
            'pengembalianDetails' => $pengembalianDetails,
            'denda' => $denda,
            'selisih' => $selisih,
            'tenggang' => $jangka,
        ]);
    }
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'username' => 'required',
            'image' => 'image|file',
            'gender' => 'required'
        ]);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete('public/' . $request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('user', 'public');
        }
        User::where('id', Auth::user()->id)->update($validateData);
        return redirect('/profile')->with('success', 'Data berhasil diubah');
    }
    public function pengembalian(Request $request)
    {
        $orderDetail = OrderDetail::where('order_id', $request->order_id)->first();
        $durasi = $orderDetail->lama_sewa * 24;
        $jangka = date('Y-m-d', strtotime($orderDetail->tanggal_sewa . '+' . $durasi . 'hours'));
        $order = Order::where('id', $request->order_id)->first();
        $kendaraan = Kendaraan::where('id', $orderDetail->kendaraan_id)->first();
        $tgl_kembali = Carbon::parse($request->tanggal_kembali);
        $selisih = $tgl_kembali->diffInDays($jangka);
        $denda = $selisih * $orderDetail->total_bayar;

        if ($request->tanggal_kembali > $jangka) {
            return view('homepage.denda', [
                'title' => 'Denda',
                'orderDetail' => $orderDetail,
                'denda' => $denda,
                'banks' => Bank::all(),
                'tanggal_kembali' => $request->tanggal_kembali,
                'orderDetail' => $orderDetail,
            ]);
        }

        $order->status = 2;
        $order->save();

        $pengembalian = new Pengembalian;

        $pengembalian->user_id = Auth::user()->id;
        $pengembalian->order_id = $request->order_id;
        $pengembalian->save();

        $target = Pengembalian::where('order_id', $request->order_id)->first();

        $pengembalianDetail = new PengembalianDetail;
        $pengembalianDetail->pengembalian_id = $target->id;
        $pengembalianDetail->tanggal_kembali = $request->tanggal_kembali;
        $pengembalianDetail->save();

        $ubahStock = 1;
        Kendaraan::where('id', $kendaraan->id)->update(['stock' => $ubahStock]);

        return redirect('/history')->with('success', 'Pengembalian Diterima!');
    }

    public function export($id)
    {
        $orderDetails = OrderDetail::where('order_id', $id)->first();
        // return view('export.template1', [
        //     'orderDetails' => $orderDetails
        // ]);
        // $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('export.template1', [
        //     'orderDetails' => $orderDetails
        // ]);
        $pdf = PDF::loadview('export.template1', [
            'orderDetails' => $orderDetails,
            // 'title' => 'Export PDF',
        ])->setPaper('a4', 'portrait');
        return $pdf->download('GO Rent - Laporan Penyewaan ' . $orderDetails->order->user->name . '.pdf');
        // return $pdf->stream();
    }
    public function exportOrder()
    {
        $order = OrderDetail::all();
        return view('export.template2', [
            'order' => $order,
            'title' => 'kontol'
        ]);
    }
}
