<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ImageMonitoringHotel;
use App\Models\ImageMonitoringBreed;

class UserMonitoringPhoto extends Controller
{
    public function boards($id)
    {
        $images = ImageMonitoringHotel::where('hotel_id', $id)->get();
        return view('user.monitoring-boarding-photo', compact('images')); 
    }

    public function breeds($id)
    {
        $images = ImageMonitoringBreed::where('breed_id', $id)->get();
        return view('user.monitoring-breeding-photo', compact('images')); 
    }

}
