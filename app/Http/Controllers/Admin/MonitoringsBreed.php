<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Breed;

class MonitoringsBreed extends Controller
{
    public function index()
    {
        $breeds = Breed::with('pets', 'cages')->where('status', 'Proses')->get();
        return view('admin.monitorings-breed',compact('breeds'));
    }
}
