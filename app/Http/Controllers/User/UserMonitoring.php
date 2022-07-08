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
        ->leftjoin('pets', 'hotels.pet_id', '=', 'pets.id')
        ->where('status', 'Dalam Kandang')
        ->where('pets.user_id', Auth::user()->id)
        ->get();
        $image = ImageMonitoringHotel::all();
        return view('user.monitoring-boarding', compact('hotels', 'image'));
    }

    public function breeds()
    {
        $breeds = Breed::with('pets', 'cages')
        ->leftjoin('pets', 'breeds.pet_id', '=', 'pets.id')
        ->where('status', 'Proses')
        ->where('pets.user_id', Auth::user()->id)
        ->get();
        $image = ImageMonitoringBreed::all();
        return view('user.monitoring-breeding', compact('breeds', 'image'));
    }

    public function galery($id)
    {
        $images = ImageMonitoringHotel::where('pet_id', $id)->get();

        return view('user.monitoring-boarding-photo', compact('images'));
    }

    public function table($id)
    {
        $hotels = HotelMonitoring::where('id', $id)->get();

        return view('user.monitoring-boarding-photo', compact('hotels'));
    }
}
