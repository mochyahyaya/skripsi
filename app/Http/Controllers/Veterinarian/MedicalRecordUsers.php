<?php

namespace App\Http\Controllers\Veterinarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class MedicalRecordUsers extends Controller
{
    public function index()
    {
       $users = User::where('role_id', 3)->get();
       return view('veterinarian.medical-records-user', compact('users')); 
    }
}
