<?php

namespace App\Http\Controllers\Veterinarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MedicalRecord;
use App\Models\Pet;
use App\Models\User;

class MedicalRecords extends Controller
{
    public function index($id)
    {
        $findpets = Pet::find($id);
        $pets = Pet::with('typePets', 'users')
        ->where('id', $id)
        ->get();
        $medicalrecords = MedicalRecord::with('pets')
        ->where('pet_id', $id)
        ->limit(5)
        ->orderBy('created_at', 'DESC')
        ->get();
        $otherpets = Pet::with('typePets')
        ->where('user_id', $findpets->user_id)
        ->where('id', '!=', $findpets->id)
        ->get();
        return view('veterinarian.medical-records', compact('medicalrecords', 'pets', 'otherpets'));
    }

    
    public function fetch()
    {
        $medical = MedicalRecord::with('pets')
        ->get();
        return response()->json([
            'medical' => $medical
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'needed' => 'required',
            'indication' => 'required',
            'treatment' => 'required',
            'status' => 'required'
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Terdapat inputan kosong",
                'data' => ''
            ];
        }

        else
        {
            $data = $request->all();
            $data = MedicalRecord::create([
                'needed' => $request['needed'],
                'indication' => $request['indication'],
                'treatment' => $request['treatment'],
                'status' => $request['status'],
                'pet_id' => $request['id'],
            ]);
            if($data->wasRecentlyCreated  ){
                $data = [
                    'status' => 'success',
                    'message' => 'Data rekam medis berhasil ditambahkan',
                    'data' => $data,
                ];
            } else { 
                $data = [
                    'status' => 'error',
                    'message' => 'Gagal menambahkan data rekam medis',
                    'data' => $data,
                ];
            }
        }

        return response()->json($data);
    }
}
