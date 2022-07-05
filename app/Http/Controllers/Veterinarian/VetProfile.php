<?php

namespace App\Http\Controllers\Veterinarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class VetProfile extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('veterinarian.profile', compact('user'));
    }
}
