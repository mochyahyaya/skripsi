<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HotelMonitoring;

class UserMonitoringTable extends Controller
{
    public function boards($id)
    {
        $hotels = HotelMonitoring::where('id', $id)->get();

        return view('user.monitoring-boarding-photo', compact('hotels'));
    }

    public function breeds($id)
    {
        $breeds = BreedMonitoring::where('id', $id)->get();
        return view('user.monitoring-breeding.photo', compact('breeds'));
    }
}
