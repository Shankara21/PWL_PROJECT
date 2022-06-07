<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OrderController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return 'OKE!';
        $tes = $request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'opsi' => 'required',
            'kendaraan_id' => 'required',
            'tanggal_sewa' => 'required',
            'tanggal_kembali' => 'required',
            'jumlah_sewa' => 'required',
        ]);
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
