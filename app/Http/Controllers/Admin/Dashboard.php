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
                ->select('g.status', 'g.service_id', 'g.created_at', 'g.pet_id', 'p.name')
                ->leftjoin('pets as p', 'g.pet_id', '=', 'p.id')
                ->orderBy('created_at', 'ASC')
                ->get();
        $hotels = DB::table('hotels as h')
                ->select('h.status', 'h.service_id', 'h.created_at', 'h.pet_id','p.name')
                ->leftjoin('pets as p', 'h.pet_id', '=', 'p.id')
                ->orderBy('created_at', 'ASC')
                ->get();
        $breeds = DB::table('breeds as b')
                ->select('b.status', 'b.service_id', 'b.created_at', 'b.pet_id', 'p.name')
                ->leftjoin('pets as p', 'b.pet_id', '=', 'p.id')
                ->orderBy('created_at', 'ASC')
                ->get();
        array_push($joins, $grooms);
        array_push($joins, $hotels);
        array_push($joins, $breeds);
        $service = count($joins);

        // $gJanuary = DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  1)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        // $gFebruary = DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  2)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        // $gMarch= DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  3)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        // $gApril= DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  4)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        // $gMay= DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  5)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        // $gJune= DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  6)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        $gJuly = DB::table('grooms as g')
        ->selectRaw('SUM(price) AS price')
        ->where('status', 'Selesai')
        ->whereMonth('created_at', 7)
        ->orderBy('created_at', 'ASC')
        ->get();

        // $gAugust = DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  8)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        // $gSeptember = DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  9)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        // $gOctober = DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  10)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        // $gNovember = DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  11)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        // $gDecember = DB::table('grooms as g')
        // ->select('g.price', 'g.service_id', 'g.created_at')
        // ->where('status', 'Selesai')
        // ->where(DB::Raw("month(created_at"), '=',  12)
        // ->orderBy('created_at', 'ASC')
        // ->get();

        $data = json_encode($gJuly);
        return view('admin.dashboard', compact('users', 'cages', 'pets', 'joins'));
    }


}
