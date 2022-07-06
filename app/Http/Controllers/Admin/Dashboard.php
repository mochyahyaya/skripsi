<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Pet;
use App\Models\Cage;
use App\Models\Groom;
use App\Models\Hotel;
use App\Models\Breed;
use App\Models\User;

class Dashboard extends Controller
{
    public function index()
    {
        $cages = Cage::all()->count();
        $pets = Pet::where('user_id', 3)->count();
        $users = User::where('role_id', 3)->count();

        $joins = [];
        $grooms = DB::table('grooms as g')
                ->select('g.status', 'g.service_id', 'g.updated_at', 'g.pet_id', 'p.name', 'p.filename')
                ->leftjoin('pets as p', 'g.pet_id', '=', 'p.id')
                ->orderBy('updated_at', 'DESC')
                ->get();
        $hotels = DB::table('hotels as h')
                ->select('h.status', 'h.service_id', 'h.updated_at', 'h.pet_id','p.name', 'p.filename')
                ->leftjoin('pets as p', 'h.pet_id', '=', 'p.id')
                ->orderBy('updated_at', 'DESC')
                ->get();
        $breeds = DB::table('breeds as b')
                ->select('b.status', 'b.service_id', 'b.updated_at', 'b.pet_id', 'p.name', 'p.filename')
                ->leftjoin('pets as p', 'b.pet_id', '=', 'p.id')
                ->orderBy('updated_at', 'DESC')
                ->get();
        array_push($joins, $grooms);
        array_push($joins, $hotels);
        array_push($joins, $breeds);
        $service = count($joins);

        $grooms = Groom::select(DB::raw("SUM(price) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count', 'month_name');

        $hotels = Hotel::select(DB::raw("SUM(price) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count', 'month_name');

        $breeds = Breed::select(DB::raw("SUM(price) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count', 'month_name');

        $groomsCount = Groom::where('status', 'Selesai')
        ->count();

        $hotelsCount = Hotel::where('status', 'Selesai')
        ->count();

        $breedsCount = Breed::where('status', 'Selesai')
        ->count();
        
        $labels = $grooms->keys();
        $grooms = $grooms->values();
        $hotels = $hotels->values();
        $breeds = $breeds->values();
        $groomsCount = $groomsCount;
        $hotelsCount = $hotelsCount;
        $breedsCount = $breedsCount;
        // dd($breedsCount);
        
        return view('admin.dashboard', compact('users', 'cages', 'pets', 'joins', 'grooms', 'hotels', 'breeds', 'labels', 'groomsCount', 'hotelsCount', 'breedsCount'));
    }


}
