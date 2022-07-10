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
        $image = ImageMonitoringHotel::all();
        return view('admin.monitorings-hotel', compact('hotels', 'image'));
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
            $hotels = Hotel::find($request['hotel_id']);
            $data = HotelMonitoring::create([
                'food' => $request['food'],
                'temperature'=> $request['temperature'],
                'medicine'=> $request['medicine'],
                'notes'=> $request['notes'],
                'hotel_id' => $request['hotel_id']
            ]);

            $data->save();

            if($request->has("images")){
                $files=$request->file("images");
                foreach($files as $file){
                    $imageName=str_replace(' ', '', time().'_'.$file->getClientOriginalName());
                    $file->move(\public_path("/images/hotelmonitoring"),$imageName);
                    ImageMonitoringHotel::create([
                        'filename' => $imageName,
                        'pet_id' => $data->id
                    ]);
                }
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
