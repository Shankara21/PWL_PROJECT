<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KendaraanController;

use App\Models\Kendaraan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//! Routing Homepage
Route::get('/', function () {
    return view('homepage.index');
});
Route::get('/about', function () {
    return view('homepage.about');
});
Route::get('/service', function () {
    return view('homepage.service');
});
Route::get('/project', function () {
    return view('homepage.project', [
        'kendaraan' => Kendaraan::latest()->paginate(6)
    ]);
});
Route::get('/contact', function () {
    return view('homepage.contact');
});
Route::get('/testimonial', function () {
    return view('homepage.testimonial');
});

Route::get('/tes', function () {
    return view('auth.layouts.layouts-auth');
});


//! Routing Dashboard
Auth::routes();

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
    Route::resource('/dashboard/brand', BrandController::class);
    Route::resource('/dashboard/category', CategoryController::class);
    Route::resource('/dashboard/kendaraan', KendaraanController::class);
});
