<?php

namespace App\Http\Controllers\Veterinarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Pet;
use App\Models\Cage;
use App\Models\Groom;
use App\Models\Hotel;
use App\Models\Breed;
use App\Models\User;

class DashboardVet extends Controller
{
    public function index()
    {
        $cages = Cage::all()->count();
        $pets = Pet::where('user_id', 3)->count();
        $users = User::where('role_id', 3)->count();
        return view('veterinarian.dashboard', compact('users', 'cages', 'pets'));
    }
}
