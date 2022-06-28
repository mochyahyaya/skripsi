<?php

use Illuminate\Support\Facades\Route;

//Admin
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Grooms;
use App\Http\Controllers\Admin\Hotels;
use App\Http\Controllers\Admin\MonitoringsHotel;
use App\Http\Controllers\Admin\Breeds;
use App\Http\Controllers\Admin\MonitoringsBreed;
use App\Http\Controllers\Admin\Users;
use App\Http\Controllers\Admin\Pets;
use App\Http\Controllers\Admin\Cages;
use App\Http\Controllers\Admin\Reports;
use App\Http\Controllers\Admin\Dummy;

//Vetrinarian
use App\Http\Controllers\Veterinarian\DashboardVet;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('students', [Dummy::class, 'index']);
Route::post('students', [Dummy::class, 'store']);
Route::get('fetch-students', [Dummy::class, 'fetchstudent']);
Route::get('edit-student/{id}', [Dummy::class, 'edit']);
Route::put('update-student/{id}', [Dummy::class, 'update']);
Route::delete('delete-student/{id}', [Dummy::class, 'destroy']);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [Dashboard::class, 'index'])->name('admin/dashboard');
        Route::post('ref-pet', [Dashboard::class, 'refPets'])->name('admin/refPets');
    
        Route::get('grooms', [Grooms::class, 'index'])->name('admin/grooms');
        Route::get('grooms-fetch', [Grooms::class, 'fetch'])->name('admin/groomsFetch');
        Route::post('grooms-store', [Grooms::class, 'store'])->name('admin/groomsStore');
        Route::get('grooms-edit/{id}', [Grooms::class, 'edit'])->name('admin/groomsEdit');
        Route::put('grooms-update/{id}', [Grooms::class, 'update'])->name('admin/groomsUpdate');
        Route::delete('grooms-delete/{id}', [Grooms::class, 'destroy'])->name('admin/groomsDestroy');
        Route::post('grooms-ref-pet', [Grooms::class, 'refPets'])->name('admin/refPetsGrooms');
    
        Route::get('hotels', [Hotels::class, 'index'])->name('admin/hotels');
        Route::get('hotels-fetch', [Hotels::class, 'fetch'])->name('admin/hotelsFetch');
        Route::post('hotels-store', [Hotels::class, 'store'])->name('admin/hotelsStore');
        Route::get('hotels-edit/{id}', [Hotels::class, 'edit'])->name('admin/hotelsEdit');
        Route::put('hotels-update/{id}', [Hotels::class, 'update'])->name('admin/hotelsUpdate');
        Route::delete('hotels-delete/{id}', [Hotels::class, 'destroy'])->name('admin/hotelsDestroy');
        Route::post('hotels-ref-pet', [Hotels::class, 'refPets'])->name('admin/refPetsHotels');
        Route::post('hotels-ref-cage', [Hotels::class, 'refCages'])->name('admin/refCages');

        Route::get('monitorings-hotel', [MonitoringsHotel::class, 'index'])->name('admin/monitoringsHotel');
        Route::post('monitorings-hotel-store', [MonitoringsHotel::class, 'store'])->name('admin/monitoringsHotelStore');

        Route::get('breeds', [Breeds::class, 'index'])->name('admin/breeds');
        Route::get('breeds-fetch', [Breeds::class, 'fetch'])->name('admin/breedsFetch');
        Route::post('breeds-store', [Breeds::class, 'store'])->name('admin/breedsStore');
        Route::get('breeds-edit/{id}', [Breeds::class, 'edit'])->name('admin/breedsEdit');
        Route::put('breeds-update/{id}', [Breeds::class, 'update'])->name('admin/breedsUpdate');
        Route::delete('breeds-delete/{id}', [Breeds::class, 'destroy'])->name('admin/breedsDestroy');
        Route::post('breeds-ref-pet', [Breeds::class, 'refPets'])->name('admin/refPetsBreeds');
        Route::post('breeds-ref-cage', [Breeds::class, 'refCages'])->name('admin/refCagesBreeds');

        Route::get('monitorings-breed', [MonitoringsBreed::class, 'index'])->name('admin/monitoringsBreed');
        Route::post('monitorings-breed-store', [MonitoringsBreed::class, 'store'])->name('admin/monitoringsBreedStore');
        

        Route::get('users', [Users::class, 'index'])->name('admin/users');
        Route::get('users-fetch', [Users::class, 'fetch'])->name('admin/usersFetch');
        Route::post('users-store', [Users::class, 'store'])->name('admin/usersStore');
        Route::get('users-edit/{id}', [Users::class, 'edit'])->name('admin/usersEdit');
        Route::put('users-update/{id}', [Users::class, 'update'])->name('admin/usersUpdate');
        Route::delete('users-delete/{id}', [Users::class, 'destroy'])->name('admin/usersDestroy');

        Route::get('pets', [Pets::class, 'index'])->name('admin/pets');
        Route::get('pets-fetch', [Pets::class, 'fetch'])->name('admin/petsFetch');
        Route::post('pets-store', [Pets::class, 'store'])->name('admin/petsStore');
        Route::get('pets-edit/{id}', [Pets::class, 'edit'])->name('admin/petsEdit');
        Route::put('pets-update/{id}', [Pets::class, 'update'])->name('admin/petsUpdate');
        Route::delete('pets-delete/{id}', [Pets::class, 'destroy'])->name('admin/petsDestroy');

        Route::get('cages', [Cages::class, 'index'])->name('admin/cages');
        Route::get('cages-fetch', [Cages::class, 'fetch'])->name('admin/cagesFetch');
        Route::post('cages-store', [Cages::class, 'store'])->name('admin/cagesStore');
        Route::get('cages-edit/{id}', [Cages::class, 'edit'])->name('admin/cagesEdit');
        Route::get('cages-update/{id}', [Cages::class, 'update'])->name('admin/cagesUpdate');
        Route::get('cages-delete/{id}', [Cages::class, 'destroy'])->name('admin/cagesDestroy');

        Route::get('reports', [Reports::class, 'index'])->name('admin/reports');
    });

    Route::prefix('veterinarian')->group(function () {
        Route::get('dashboard', [DashboardVet::class, 'index'])->name('veterinarian/dashboard');
    });

});
