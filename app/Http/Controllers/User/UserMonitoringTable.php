<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HotelMonitoring;
use App\Models\BreedMonitoring;

class UserMonitoringTable extends Controller
{
    public function boards($id)
    {
        $hotels = HotelMonitoring::where('hotel_id', $id)->get();

        return view('user.monitoring-boarding-table', compact('hotels'));
    }

    public function breeds($id)
    {
        $breeds = BreedMonitoring::where('breed_id', $id)->get();
        return view('user.monitoring-breeding-table', compact('breeds'));
    }
}
