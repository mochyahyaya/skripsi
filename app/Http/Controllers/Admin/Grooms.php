<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Groom;
use App\Models\User;

class Grooms extends Controller
{
    public function index()
    {   
        $users = User::all();
        $grooms = Groom::all();
        return view('admin.grooms', compact('grooms', 'users'));
    }
}
