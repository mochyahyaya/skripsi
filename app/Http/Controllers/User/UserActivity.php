<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Pet;
use App\Models\Cage;
use App\Models\Groom;
use App\Models\Hotel;
use App\Models\Breed;
use App\Models\User;

class UserActivity extends Controller
{
    public function index()
    {
        $joins = [];
        $grooms = DB::table('grooms as g')
                ->select('g.status', 'g.service_id', 'g.updated_at', 'g.pet_id', 'p.name', 'p.filename')
                ->leftjoin('pets as p', 'g.pet_id', '=', 'p.id')
                ->where('p.user_id', Auth::user()->id)
                ->orderBy('updated_at', 'DESC')
                ->get();
        $hotels = DB::table('hotels as h')
                ->select('h.status', 'h.service_id', 'h.updated_at', 'h.pet_id','p.name', 'p.filename')
                ->leftjoin('pets as p', 'h.pet_id', '=', 'p.id')
                ->where('p.user_id', Auth::user()->id)
                ->orderBy('updated_at', 'DESC')
                ->get();
        $breeds = DB::table('breeds as b')
                ->select('b.status', 'b.service_id', 'b.updated_at', 'b.pet_id', 'p.name', 'p.filename')
                ->leftjoin('pets as p', 'b.pet_id', '=', 'p.id')
                ->where('p.user_id', Auth::user()->id)
                ->orderBy('updated_at', 'DESC')
                ->get();
        array_push($joins, $grooms);
        array_push($joins, $hotels);
        array_push($joins, $breeds);
        $service = count($joins);
        // return view('user.history-activity', compact('joins'));
    }

    public function grooms()
    {
        $grooms = DB::table('grooms as g')
        ->select('g.status', 'g.service_id', 'g.updated_at', 'g.pet_id', 'g.service', 'p.name as petname', 'p.filename', 's.name')
        ->leftjoin('pets as p', 'g.pet_id', '=', 'p.id')
        ->leftjoin('services as s', 'g.service_id', '=', 's.id')
        ->where('p.user_id', Auth::user()->id)
        ->orderBy('updated_at', 'DESC')
        ->get();

        return view('user.user-activity-grooming', compact('grooms'));
    }

    public function boards()
    {
        $hotels = DB::table('hotels as h')
            ->select('h.status', 'h.service_id', 'h.updated_at', 'h.start_at', 'h.end_at', 'h.pet_id','p.name as petname', 'p.filename', 's.name')
            ->leftjoin('pets as p', 'h.pet_id', '=', 'p.id')
            ->leftjoin('services as s', 'h.service_id', '=', 's.id')
            ->where('p.user_id', Auth::user()->id)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return view('user.user-activity-boardings', compact('hotels'));
    }

    public function breeds()
    {
        $breeds = DB::table('breeds as b')
        ->select('b.status', 'b.service_id', 'b.updated_at', 'b.start_at', 'b.end_at', 'b.pet_male', 'b.pet_id', 'p.name as petname', 'p.filename', 's.name')
        ->leftjoin('pets as p', 'b.pet_id', '=', 'p.id')
        ->leftjoin('services as s', 'b.service_id', '=', 's.id')
        ->where('p.user_id', Auth::user()->id)
        ->orderBy('updated_at', 'DESC')
        ->get();

        return view('user.user-activity-breeding', compact('breeds'));
    }
}
