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
        $joins = [];
        $grooms = DB::table('grooms as g')
                ->select('g.price', 'g.service_id', 'g.created_at')
                ->where('status', 'Selesai')
                ->orderBy('created_at', 'ASC')
                ->get();
        $hotels = DB::table('hotels as h')
                ->select('h.price', 'h.service_id', 'h.created_at')
                ->where('status', 'Selesai')
                ->orderBy('created_at', 'ASC')
                ->get();
        $breeds = DB::table('breeds as b')
                ->select('b.price', 'b.service_id', 'b.created_at')
                ->where('status', 'Selesai')
                ->orderBy('created_at', 'ASC')
                ->get();
        array_push($joins, $grooms);
        array_push($joins, $hotels);
        array_push($joins, $breeds);
        $service = count($joins);
        return view('admin.reports', compact('joins'));
    }

    public function refMonths(Request $request)
    {
        $data = $request->all();
        $joins = [];
        $grooms = DB::table('grooms as g')
                ->select('g.price', 'g.service_id', 'g.created_at')
                ->where('status', 'Selesai')
                ->where(DB::Raw("month(created_at"), '=',  $request['month'])
                ->orderBy('created_at', 'ASC')
                ->get();
        $hotels = DB::table('hotels as h')
                ->select('h.price', 'h.service_id', 'h.created_at')
                ->where('status', 'Selesai')
                ->where(DB::Raw("month(created_at"), '=',  $request['month'])
                ->orderBy('created_at', 'ASC')
                ->get();
        $breeds = DB::table('breeds as b')
                ->select('b.price', 'b.service_id', 'b.created_at')
                ->where('status', 'Selesai')
                ->where(DB::Raw("month(created_at"), '=',  $request['month'])
                ->orderBy('created_at', 'ASC')
                ->get();
        array_push($joins, $grooms);
        array_push($joins, $hotels);
        array_push($joins, $breeds);
        $service = count($joins);

        $data = [
            'status' => 'success',
            'messages' => 'Berhasil menampilkan data'

        ];

        return response()->json([
            'joins' => $joins,
            'data' => $data
        ]);
    }
}
