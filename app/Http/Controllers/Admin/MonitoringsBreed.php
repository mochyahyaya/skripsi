<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Breed;
use App\Models\BreedMonitoring;
use App\Models\ImageMonitoringBreed;
use App\Models\ImageMonitoringHotel;


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
            $breeds = Breed::find($request['breed_id']);
            $data = BreedMonitoring::create([
                'food' => $request['food'],
                'temperature'=> $request['temperature'],
                'notes'=> $request['notes'],
                'breed_id' => $request['breed_id']
            ]);

            $data->save();
            if($request->has("images")){
                $files=$request->file("images");
                foreach($files as $file){
                    $imageName=str_replace(' ', '', time().'_'.$file->getClientOriginalName());
                    $file->move(\public_path("/images/breedmonitoring"),$imageName);
                    ImageMonitoringBreed::create([
                        'filename' => $imageName,
                        'pet_id' => $data->breeds->pet_id
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
