<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hotel;

class MonitoringsHotel extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('pets', 'cages')->where('status', 'Dalam Kandang')->get();
        return view('admin.monitorings-hotel', compact('hotels'));
    }
}
