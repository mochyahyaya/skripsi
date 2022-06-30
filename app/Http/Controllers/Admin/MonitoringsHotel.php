<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Hotel;
use App\Models\HotelMonitoring;
use App\Models\ImageMonitoringHotel;

class MonitoringsHotel extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('pets', 'cages')->where('status', 'Dalam Kandang')->get();
        return view('admin.monitorings-hotel', compact('hotels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'food' => 'required',
            'temperature' => 'required',
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Gagal menambahkan data monitoring",
                'data' => ''
            ];
        }

        else
        {
            $data = $request->all();
            $data = HotelMonitoring::create([
                'food' => $request['food'],
                'temperature'=> $request['temperature'],
                'notes'=> $request['notes'],
                'hotel_id' => $request['hotel_id']
            ]);

            if($request->photo > 0)
            {
                   
               for ($x = 0; $x < $request->photo; $x++) 
               {
                   if ($request->hasFile('photo'.$x)) 
                    {
                        $file      = $request->file('images'.$x);
                        $path = $file->store('public/HotelMonitoring');
                        $name = $file->getClientOriginalName();
                        $insert[$x]['name'] = $name;
                        $insert[$x]['path'] = $path;
                    }
               }
                ImageMonitoringHotel::insert($insert);
            }
            $data = [
                'status' => 'success',
                'message' => 'Data monitoring berhasil ditambahkan',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }
}
