<?php

use App\Models\Kendaraan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KendaraanController;
use App\Models\Contacts;

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
Route::controller(HomepageController::class)->group(function () {
    Route::get('/', 'home');
    Route::get('/about', 'about');
    Route::get('/service', 'service');
    Route::get('/project', 'project');
    Route::get('/team', 'team');
    Route::get('/contact', 'contact');
    Route::get('/testimonial', 'testimonial');
    Route::get('/detail/{kendaraan}', 'show');
});
Route::post('/contact', [ContactsController::class, 'store']);

//! Routing Auth 
Auth::routes();

//! Routing Dashboard
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
    Route::resource('/dashboard/brand', BrandController::class);
    Route::resource('/dashboard/category', CategoryController::class);
    Route::resource('/dashboard/kendaraan', KendaraanController::class);
    Route::resource('/dashboard/contacts', ContactsController::class);
});
