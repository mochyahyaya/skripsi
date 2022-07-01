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
        ->get();
        $otherpets = Pet::with('typePets')
        ->where('user_id', $findpets->user_id)
        ->where('id', '!=', $findpets->id)
        ->get();
        // dd($otherpets);
        return view('veterinarian.medical-records', compact('medicalrecords', 'pets', 'otherpets'));
    }
}
