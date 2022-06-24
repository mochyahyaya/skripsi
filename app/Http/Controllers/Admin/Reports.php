<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Groom;
use App\Models\Hotel;
use App\Models\Breed;

class Reports extends Controller
{
    public function index()
    {
        $shares = DB::table('grooms as g')
                     ->select("g.price as gprice", "g.pet_id as gpetid", "h.price", "h.pet_id")
                     ->join('hotels as h', 'g.pet_id', '=', 'h.pet_id')
                     ->where('g.status', 'Selesai')
                     ->where('h.status', 'Selesai')
                     ->get();
        dd($shares);
        return view('admin.reports');
    }
}
