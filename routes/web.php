<?php

use App\Models\Contacts;
use App\Models\Kendaraan;
use App\Http\Controllers\tespesanan;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BankController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDendaController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\UserDashboardController;

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
    Route::get('/detail/{kendaraan}', 'show')->middleware('auth');
    Route::get('/cart', 'cart')->middleware('auth');
    Route::get('/checkout', 'checkout')->middleware('auth');
    Route::get('/onProcess', 'onProcess')->middleware('auth');
    Route::get('/history', 'history')->middleware('auth');
    Route::get('/profile', 'profile')->middleware('auth');
    Route::Post('/profile', 'update')->middleware('auth');
    Route::post('/return', 'pengembalian')->middleware('auth');
    Route::get('/export/{id}', 'export')->middleware('auth');
    Route::get('/exportOrder', 'exportOrder')->middleware('auth');
    Route::get('/details/{id}', 'details')->middleware('auth');
});
Route::post('/contact', [ContactsController::class, 'store']);
Route::resource('/orderDetail', OrderDetailController::class);
Route::post('/checkout/{id}', [checkoutController::class, 'store']);
Route::resource('/testimoni', TestimoniController::class);
Route::resource('/denda', DendaController::class);

//! Routing Auth
Auth::routes();

//! Routing Dashboard
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/dashboard/bank', BankController::class);
    Route::resource('/dashboard/brand', BrandController::class);
    Route::resource('/dashboard/category', CategoryController::class);
    Route::resource('/dashboard/type', TypeController::class);
    Route::resource('/dashboard/kendaraan', KendaraanController::class);
    Route::resource('/dashboard/contacts', ContactsController::class);
    Route::resource('/dashboard/order', OrderController::class);
    Route::resource('/dashboard/user', UserDashboardController::class);
    Route::resource('/dashboard/denda', DashboardDendaController::class);
    Route::resource('/dashboard/pengembalian', PengembalianController::class);
    Route::get('/order/pdf', [OrderController::class, 'cetak_pdf']);
    Route::get('/return/pdf', [PengembalianController::class, 'cetak_pdf']);
    Route::get('/cetak/denda', [DashboardDendaController::class, 'cetak_pdf']);
});
