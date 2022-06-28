<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Breed;
use App\Models\BreedMonitoring;

class MonitoringsBreed extends Controller
{
    public function index()
    {
        $breeds = Breed::with('pets', 'cages')->where('status', 'Proses')->get();
        return view('admin.monitorings-breed',compact('breeds'));
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
            $data = BreedMonitoring::create([
                'food' => $request['food'],
                'temperature'=> $request['temperature'],
                'notes'=> $request['notes'],
                'breed_id' => $request['breed_id']
            ]);

            $data = [
                'status' => 'success',
                'message' => 'Data monitoring berhasil ditambahkan',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }
}
