<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kategori.index', [
            'categories' => Category::all(),
            'title' => 'Category',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create', [
            'title' => 'Tambah Category',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:categories,nama'
        ]);

        Category::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        return redirect('/dashboard/category')->with('toast_success', 'Kategori baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.kategori.edit', [
            'category' => $category,
            'title' => 'Edit Category',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:categories,nama'
        ]);
        Category::where('id', $category->id)
        ->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama)
        ]);

        return redirect('/dashboard/category')->with('toast_success', 'Kategori berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);
        try {
            $category->delete();
            alert()->success('SuccessAlert','Data Berhasil dihapus.');
        } catch (\Exception $e){
        if($e->getCode() == "23000"){
            alert()->error('ErrorAlert','Data tidak bisa dihapus karena berelasi ditabel lain.');
        }}
        return redirect('/dashboard/category');
        // Category::destroy($category->id);
        // return redirect('/dashboard/category')->with('toast_success', 'Kategori berhasil di hapus!');
    }
}
