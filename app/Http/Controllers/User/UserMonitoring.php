<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hotel;
use App\Models\HotelMonitoring;
use App\Models\ImageMonitoringHotel;

class UserMonitoring extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('pets', 'cages')->where('status', 'Dalam Kandang')->get();
        $image = ImageMonitoringHotel::all();
        return view('user.monitoring-boarding', compact('hotels', 'image'));
    }
}
