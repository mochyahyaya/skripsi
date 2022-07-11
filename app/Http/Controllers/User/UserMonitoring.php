<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Hotel;
use App\Models\Breed;
use App\Models\HotelMonitoring;
use App\Models\ImageMonitoringHotel;
use App\Models\ImageMonitoringBreed;

class UserMonitoring extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('pets', 'cages')
        ->select('*', 'hotels.id as hotelsid')
        ->join('pets', 'hotels.pet_id', '=', 'pets.id')
        ->where('status', 'Dalam Kandang')
        ->get();
        // dd($hotel);
        $image = ImageMonitoringHotel::all();
        return view('user.monitoring-boarding', compact('hotels', 'image'));
    }

    public function breeds()
    {
        $breeds = Breed::with('pets', 'cages')
        ->select('*', 'breeds.id as breedsid')
        ->join('pets', 'breeds.pet_id', '=', 'pets.id')
        ->where('status', 'Proses')
        ->where('user_id', Auth::user()->id)
        ->get();
        // dd($breeds);
        $image = ImageMonitoringBreed::all();
        return view('user.monitoring-breeding', compact('breeds', 'image'));
    }
}
