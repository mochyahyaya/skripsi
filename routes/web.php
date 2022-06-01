<?php

use Illuminate\Support\Facades\Route;

//Admin
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Grooms;
use App\Http\Controllers\Admin\Hotels;
use App\Http\Controllers\Admin\Breeds;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('admin/dashboard', [Dashboard::class, 'index'])->name('admin/dashboard');
    Route::get('admin/grooms', [Grooms::class, 'index'])->name('admin/grooms');
    Route::get('admin/hotels', [Hotels::class, 'index'])->name('admin/hotels');
    Route::get('admin/breeds', [Grooms::class, 'index'])->name('admin/breeds');
});
