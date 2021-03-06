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
use App\Http\Controllers\Admin\Profile;
use App\Http\Controllers\Admin\AdminTestimonials;
use App\Http\Controllers\Admin\Dummy;

//Vetrinarian
use App\Http\Controllers\Veterinarian\DashboardVet;
use App\Http\Controllers\Veterinarian\MedicalRecords;
use App\Http\Controllers\Veterinarian\MedicalRecordUsers;
use App\Http\Controllers\Veterinarian\MedicalRecordPets;
use App\Http\Controllers\Veterinarian\VetProfile;
use App\Http\Controllers\Veterinarian\Inpatient;

//User
use App\Http\Controllers\User\DashboardUser;
use App\Http\Controllers\User\UserGrooms;
use App\Http\Controllers\User\UserHotels;
use App\Http\Controllers\User\UserBreeds;
use App\Http\Controllers\User\UserActivity;
use App\Http\Controllers\User\UserMonitoring;
use App\Http\Controllers\User\UserMonitoringPhoto;
use App\Http\Controllers\User\UserMonitoringTable;
use App\Http\Controllers\User\UserProfile;

use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

        Route::get('monitorings-hotel-tables/{id}', [MonitoringsHotel::class, 'table'])->name('admin/monitoringsTableHotel');
        Route::get('monitorings-hotel-galery/{id}', [MonitoringsHotel::class, 'galery'])->name('admin/monitoringsGaleryHotel');

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
        Route::get('monitorings-breed-tables/{id}', [MonitoringsBreed::class, 'table'])->name('admin/monitoringsTableBreed');
        Route::get('monitorings-breed-galery/{id}', [MonitoringsBreed::class, 'galery'])->name('admin/monitoringsGaleryBreed');
        
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

        Route::get('admin-testimonials', [AdminTestimonials::class, 'index'])->name('admin/testimonials');
        Route::get('admin-testimonials-fetch', [AdminTestimonials::class, 'fetch'])->name('admin/testimonialsFetch');
        Route::get('admin-testimonials-edit/{id}', [AdminTestimonials::class, 'edit'])->name('admin/testimonialsEdit');
        Route::put('admin-testimonials-update/{id}', [AdminTestimonials::class, 'update'])->name('admin/testimonialsUpdate');
        Route::delete('admin-testimonials-delete/{id}', [AdminTestimonials::class, 'destroy'])->name('admin/testimonialsDestroy');

        Route::get('reports', [Reports::class, 'index'])->name('admin/reports');
        Route::post('ref-month', [Reports::class, 'refMonth'])->name('admin/refMonths');

        Route::get('profile', [Profile::class, 'index'])->name('admin/profile');
        Route::put('profile-update', [Profile::class, 'update'])->name('admin/profileUpdate');
    });

    Route::prefix('veterinarian')->group(function () {
        Route::get('dashboard', [DashboardVet::class, 'index'])->name('veterinarian/dashboard');
        Route::get('medical-records/{id}', [MedicalRecords::class, 'index'])->name('veterinarian/medicalRecords');
        Route::get('medical-records-user', [MedicalRecordUsers::class, 'index'])->name('veterinarian/medicalRecordUsers');
        Route::get('medical-records-pet/{id}', [MedicalRecordPets::class, 'index'])->name('veterinarian/medicalRecordPets');
        Route::get('medical-records-pet-fetch', [MedicalRecords::class, 'fetch'])->name('veterinarian/medicalRecordsFetch');
        Route::post('medical-records-pet-store/', [MedicalRecords::class, 'store'])->name('veterinarian/medicalRecordsStore');
        Route::get('medical-records-pet-edit/{id}', [MedicalRecords::class, 'edit'])->name('veterinarian/medicalRecordsEdit');
        Route::put('medical-records-pet-update/{id}', [MedicalRecords::class, 'update'])->name('veterinarian/medicalRecordsUpdate');
        Route::get('profile', [VetProfile::class, 'index'])->name('veterinarian/profile');
        Route::put('vet-profile-update', [VetProfile::class, 'update'])->name('veterinarian/profileUpdate');

        Route::get('inpatients', [Inpatient::class, 'index'])->name('veterinarian/inpatients');
        Route::get('inpatients-fetch', [Inpatient::class, 'fetch'])->name('veterinarian/inpatientsFetch');
        Route::post('inpatients-store', [Inpatient::class, 'store'])->name('veterinarian/inpatientsStore');
        Route::get('inpatients-edit/{id}', [Inpatient::class, 'edit'])->name('veterinarian/inpatientsEdit');
        Route::put('inpatients-update/{id}', [Inpatient::class, 'update'])->name('veterinarian/inpatientsUpdate');
        Route::delete('inpatients-delete/{id}', [Inpatient::class, 'destroy'])->name('veterinarian/inpatientsDestroy');
        Route::post('inpatients-ref-pet', [Inpatient::class, 'refPets'])->name('veterinarian/refPetsHotels');
        Route::post('inpatients-ref-cage', [Inpatient::class, 'refCages'])->name('veterinarian/refCages');

    });

    Route::prefix('user')->group(function () {
        Route::get('dashboard', [DashboardUser::class, 'index'])->name('user/dashboard');
        Route::post('user-grooms', [DashboardUser::class, 'grooms'])->name('user/userGroomsStore');
        Route::post('user-hotels', [DashboardUser::class, 'hotels'])->name('user/userHotelsStore');
        Route::post('user-breeds', [DashboardUser::class, 'breeds'])->name('user/userBreedsStore');
        Route::post('user-testimonials', [DashboardUser::class, 'testimonial'])->name('user/userTestimonialsStore');
        Route::get('user-profile', [UserProfile::class, 'index'])->name('user/userProfile');
        Route::put('user-profile-update', [UserProfile::class, 'update'])->name('user/profileUpdate');
        Route::get('user-monitoring',[UserMonitoring::class, 'index'])->name('user/userMonitoring');
        Route::get('user-monitoring-breeds', [UserMonitoring::class, 'breeds'])->name('user/userMonitoringBreeds');
        Route::get('user-monitoring-photo/{id}',[UserMonitoringPhoto::class, 'boards'])->name('user/userMonitoringPhoto');
        Route::get('user-monitoring-table/{id}',[UserMonitoringTable::class, 'boards'])->name('user/userMonitoringTable');
        Route::get('user-monitoring-photo-breed/{id}',[UserMonitoringPhoto::class, 'breeds'])->name('user/userMonitoringPhotoBreeds');
        Route::get('user-monitoring-table-breed/{id}',[UserMonitoringTable::class, 'breeds'])->name('user/userMonitoringTableBreeds');
        Route::get('user-activity-grooms', [UserActivity::class, 'grooms'])->name('user/userActivityGrooms');
        Route::get('user-activity-boards', [UserActivity::class, 'boards'])->name('user/userActivityHotels');
        Route::get('user-activity-breeds', [UserActivity::class, 'breeds'])->name('user/userActivityBreeds');
    });

});
