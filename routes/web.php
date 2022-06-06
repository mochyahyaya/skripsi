<?php

use Illuminate\Support\Facades\Route;

//Admin
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Grooms;
use App\Http\Controllers\Admin\Hotels;
use App\Http\Controllers\Admin\Breeds;
use App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Admin\Pets;
use App\Http\Controllers\Admin\Cages;
use App\Http\Controllers\Admin\Reports;

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
    Route::post('admin/ref-pet', [Dashboard::class, 'refPets'])->name('admin/refPets');

    Route::get('admin/grooms', [Grooms::class, 'index'])->name('admin/grooms');
    Route::post('admin/grooms-store', [Grooms::class, 'store'])->name('admin/groomsStore');
    Route::get('admin/grooms-edit/{id}', [Grooms::class, 'edit'])->name('groomsEdit');

    Route::get('admin/hotels', [Hotels::class, 'index'])->name('admin/hotels');
    Route::get('admin/breeds', [Breeds::class, 'index'])->name('admin/breeds');
    Route::get('admin/users', [Users::class, 'index'])->name('admin/users');
    Route::get('admin/pets', [Pets::class, 'index'])->name('admin/pets');
    Route::get('admin/cages', [Cages::class, 'index'])->name('admin/cages');
    Route::get('admin/reports', [Reports::class, 'index'])->name('admin/reports');
});
