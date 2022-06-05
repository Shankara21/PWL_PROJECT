<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function home()
    {
        return view('homepage.index');
    }

    public function show(Kendaraan $kendaraan)
    {
        return view('homepage.details', [
            'kendaraan' => $kendaraan,
        ]);
    }
    public function service()
    {
        return view('homepage.service');
    }
    public function about()
    {
        return view('homepage.about');
    }
    public function project()
    {

        $kendaraan = Kendaraan::latest();
        // $brand = Brand::all();
        // // Mengambil kolom nama dalam table brand
        // // $brand_name = $brand->nama;
        // // dd($brand_name);
        // // $category = Category::all();

        if (request('search')) {
            $kendaraan->where('nama', 'like', '%' . request('search') . '%');
        }

        return view('homepage.project', [
            'kendaraan' => $kendaraan->paginate(6),
        ]);
    }
    public function team()
    {
        return view('homepage.team');
    }
    public function contact()
    {
        return view('homepage.contact');
    }
    public function testimonial()
    {
        return view('homepage.testimonial');
    }
}
