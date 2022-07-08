<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ImageMonitoringHotel;

class UserMonitoringPhoto extends Controller
{
    public function boards($id)
    {
        $images = ImageMonitoringHotel::where('user_id', $id)->get();
        return view('user.monitoring-boarding-photo', compact('images')); 
    }

    public function breeds($id)
    {
        $images = ImageMonitoringBreed::where('user_id', $id)->get();
        return view('user.monitoring-breeding-photo', compact('images')); 
    }

}
