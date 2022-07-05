<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Pet;

class DashboardUser extends Controller
{
    public function index()
    {
        $pets = Pet::where('user_id', Auth::user()->id)->get();
        return view('user.dashboard', compact('pets'));
    }
}
