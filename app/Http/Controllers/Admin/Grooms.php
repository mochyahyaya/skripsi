<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Groom;

class Grooms extends Controller
{
    public function index()
    {
        $grooms = Groom::all();
        return view('admin.grooms', compact('grooms'));
    }
}
