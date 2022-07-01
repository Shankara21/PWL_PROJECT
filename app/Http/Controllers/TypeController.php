<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tipe.index', [
            'types' => Type::all(),
            'title' => 'Type',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipe.create', [
            'title' => 'Tambah Type',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:categories,nama'
        ]);

        Type::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        return redirect('/dashboard/type')->with('toast_success', 'Tipe baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.tipe.edit', [
            'type' => $type,
            'title' => 'Edit Type',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:categories,nama'
        ]);
        Type::where('id', $type->id)
            ->update([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama)
            ]);

        return redirect('/dashboard/type')->with('toast_success', 'Tipe berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type = Type::findOrFail($type->id);
        try {
            $type->delete();
            alert()->success('SuccessAlert','Data Berhasil dihapus.');
        } catch (\Exception $e){
        if($e->getCode() == "23000"){
            alert()->error('ErrorAlert','Data tidak bisa dihapus karena berelasi ditabel lain.');
        }}
        return redirect('/dashboard/type');
        // Type::destroy($type->id);
        // return redirect('/dashboard/type')->with('toast_success', 'Tipe berhasil di hapus!');
    }
}
