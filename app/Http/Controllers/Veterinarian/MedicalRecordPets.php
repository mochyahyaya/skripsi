<?php

namespace App\Http\Controllers\Veterinarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pet;

class MedicalRecordPets extends Controller
{
    public function index($id)
    {
        $pets = Pet::with('typePets')->where('user_id', $id)->get();
        return view('veterinarian.medical-records-pet', compact('pets')); 
    }
}
