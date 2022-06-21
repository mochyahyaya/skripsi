<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cage;
use App\Models\TypeCage;

class Cages extends Controller
{
    public function index()
    {
        $cages = Cage::all();
        $typeCages = TypeCage::all();
        return view('admin.cages', compact('cages', 'typeCages'));
    }

    public function fetch()
    {
        $cages = Cage::with('typeCages')->get();
        return response()->json([
            'cages' => $cages
        ]);
    }
}
