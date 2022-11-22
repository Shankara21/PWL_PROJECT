<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bank.index', [
            'banks' => Bank::all(),
            'title' => 'Bank',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.bank.create', [
        //     'title' => 'Tambah Bank',
        // ]);
        return view('admin.bank.create', [
            'title' => 'Tambah Bank',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'name' => 'required|string|max:255',
            'norek' => 'required',
            'image' => 'image|file',
        ]);
        $validatedata['slug'] = Str::slug($validatedata['name']);
        if ($request->file('image')) {
            $validatedata['image'] = $request->file('image')->store('bank', 'public');
        }
        Bank::create($validatedata);

        return redirect('/dashboard/bank')->with('toast_success', 'Bank berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('admin.bank.edit', [
            'bank' => $bank,
            'title' => 'Edit Bank',

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'norek' => 'required',
            'image' => 'required',
        ];

        $validatedata = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedata['image'] = $request->file('image')->store('bank', 'public');
        }

        $validatedata['slug'] = Str::slug($validatedata['name']);

        Bank::where('id', $bank->id)->update($validatedata);


        return redirect('/dashboard/bank')->with('toast_success', 'Bank berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank = Bank::findOrFail($bank->id);
        try {
            $bank->delete();
            alert()->success('SuccessAlert', 'Data Berhasil dihapus.');
        } catch (\Exception $e) {
            if ($e->getCode() == "23000") {
                alert()->error('ErrorAlert', 'Data tidak bisa dihapus karena berelasi ditabel lain.');
            }
        }
        return redirect('/dashboard/bank');
        // Bank::destroy($bank->id);
        // return redirect('/dashboard/bank')->with('toast_success', 'Bank berhasil di hapus!');
    }
}
