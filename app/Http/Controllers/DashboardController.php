<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Kendaraan;
use App\Models\Order;
use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard',
            'user' => User::count(),
            'brand' => Brand::count(),
            'category' => Category::count(),
            'kendaraan' => Kendaraan::count(),
            'bank' => Bank::count(),
            'order' => Order::count(),
            // 'gopay1' => Order::where('bank_id', 3)->count(),
            //     'gopay2' => Order::where('bank_id', 3)->sum('total'),
            //     'bri1' => Order::where('bank_id', 5)->count(),
            //     'bri2' => Order::where('bank_id', 5)->sum('total'),
            //     'bca1' => Order::where('bank_id', 4)->count(),
            //     'bca2' => Order::where('bank_id', 4)->sum('total'),
            //     'linkaja1' => Order::where('bank_id', 2)->count(),
            //     'linkaja2' => Order::where('bank_id', 2)->sum('total'),
            //     'mandiri1' => Order::where('bank_id', 6)->count(),
            //     'mandiri2' => Order::where('bank_id', 6)->sum('total'),
            //     'shopeepay1' => Order::where('bank_id', 1)->count(),
            //     'shopeepay2' => Order::where('bank_id', 1)->sum('total'),
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
