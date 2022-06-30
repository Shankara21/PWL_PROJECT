<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Http\Requests\StorePengembalianRequest;
use App\Http\Requests\UpdatePengembalianRequest;
use App\Models\PengembalianDetail;
use PDF;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = PengembalianDetail::latest();
        if (request('search')) {
            $pengembalian->where('tanggal_kembali', 'like', '%' . request('search') . '%');
        }
        return view('admin.pengembalian.index', [
            'returns' => $pengembalian->get(),
            'title' => 'Pengembalian',
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
     * @param  \App\Http\Requests\StorePengembalianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengembalianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalian $pengembalian)
    {
        return view('admin.pengembalian.show', [
            'return' => PengembalianDetail::find($pengembalian->id),
            'title' => 'Detail Pengembalian',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengembalianRequest  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengembalianRequest $request, Pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengembalian $pengembalian)
    {
        //
    }

    public function cetak_pdf()
    {
        $key = PengembalianDetail::all();
        $pdf = PDF::loadview('admin.pengembalian.return_pdf', [
            'returns' => $key,
            // 'title' => 'Export PDF',
        ])->setPaper('a4', 'portrait');
        return $pdf->download('GO Rent - Laporan Pengembalian.pdf');
    }
}
