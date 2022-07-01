<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Str;
use Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index', [
            'brands' => Brand::all(),
            'title' => 'Brand',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create',[
            'title' => 'Tambah Brand',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:brands',
        ]);
        Brand::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);
        return redirect('/dashboard/brand')->with('toast_success', 'Brand baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', [
            'brand' => $brand,
            'title' => 'Edit Brand',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $request->validate([
            'nama' => 'required|max:255|unique:brands,nama',

        ]);

        Brand::where('id', $brand->id)
        ->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama)
        ]);

        return redirect('/dashboard/brand')->with('toast_success', 'Brand berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand = Brand::findOrFail($brand->id);
        try {
            $brand->delete();
            alert()->success('SuccessAlert','Data Berhasil dihapus.');
        } catch (\Exception $e){
        if($e->getCode() == "23000"){
            alert()->error('ErrorAlert','Data tidak bisa dihapus karena berelasi ditabel lain.');
        }}
        return redirect('/dashboard/brand');

        // Brand::destroy($brand->id);
        // return redirect('/dashboard/brand')->with('toast_success', 'Brand berhasil di hapus!');
    }
}
