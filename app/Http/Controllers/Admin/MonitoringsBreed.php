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
                        'pet_id' => $breeds->pet_id,
                        'breed_id' => $data->id
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

    public function table($id)
    {
        $breeds = BreedMonitoring::where('breed_id', $id)->get();
        // dd($hotels);
        return view('admin.monitoring-breed-tables', compact('breeds'));
    }

    public function galery($id)
    {
        $breeds = Breed::find($id);
        $images = ImageMonitoringBreed::where('pet_id', $breeds->pet_id)
        ->where('breed_id', $id)
        ->get();
        return view('admin.monitoring-breed-galery', compact('images'));
    }
}
