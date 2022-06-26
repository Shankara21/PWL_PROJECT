<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Denda;
use App\Models\PengembalianDetail;
use Illuminate\Http\Request;
use PDF;

class DashboardDendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.denda.index', [
            'dendas' => Denda::all(),
            'title' => 'Denda',
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
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function show(Denda $denda)
    {
        $durasi = $denda->orderDetail->lama_sewa * 24;
        $jangka = date('Y-m-d', strtotime($denda->orderDetail->tanggal_sewa . '+' . $durasi . 'hours'));
        $tgl_kembali = Carbon::parse($denda->pengembalianDetail->tanggal_kembali);
        $selisih = $tgl_kembali->diffInDays($jangka);
        return view('admin.denda.show', [
            'denda' => $denda,
            'selisih' => $selisih,
            'tenggang' => $jangka,
            'title' => 'Detail Denda',
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denda $denda)
    {
        //
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

    public function cetak_pdf()
    {
        $denda = Denda::all();
        $pdf = PDF::loadview('admin.denda.denda_pdf', [
            'dendas' => $denda,
            // 'title' => 'Export PDF',
        ])->setPaper('a4', 'portrait');
        return $pdf->download('GO Rent - Laporan Denda.pdf');
    }
}
