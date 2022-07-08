<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Groom;
use App\Models\Hotel;
use App\Models\Breed;

class Reports extends Controller
{
    public function index()
    {
        $month = Carbon::now()->format('m');
        $realmonth = $month - 1;
        $arrMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul','Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        array_splice($arrMonth, $realmonth, 1);
        // dd($arrMonth);
        
        $joins = [];
        $grooms = DB::table('grooms as g')
                ->select('g.price', 'g.service_id', 'g.created_at')
                ->where('status', 'Selesai')
                ->whereMonth('created_at', $month)
                ->orderBy('created_at', 'ASC')
                ->get();
        $hotels = DB::table('hotels as h')
                ->select('h.price', 'h.service_id', 'h.created_at')
                ->where('status', 'Selesai')
                ->whereMonth('created_at', $month)
                ->orderBy('created_at', 'ASC')
                ->get();
        $breeds = DB::table('breeds as b')
                ->select('b.price', 'b.service_id', 'b.created_at')
                ->whereMonth('created_at', $month)
                ->where('status', 'Selesai')
                ->orderBy('created_at', 'ASC')
                ->get();
        array_push($joins, $grooms);
        array_push($joins, $hotels);
        array_push($joins, $breeds);
        $service = count($joins);
        return view('admin.reports', compact('joins', 'arrMonth'));
    }

    public function refMonth(Request $request)
    {
        $data = $request->all();
        // dd($request['data']);
        // $month = Carbon::now()->format('m');
        $month = $request['data'];
        $realmonth = $month +1;
        $joins = [];
        $grooms = DB::table('grooms as g')
                ->select('g.price', 'g.service_id', 'g.created_at')
                ->where('status', 'Selesai')
                ->whereMonth('created_at', $realmonth)
                ->orderBy('created_at', 'ASC')
                ->get();
        $hotels = DB::table('hotels as h')
                ->select('h.price', 'h.service_id', 'h.created_at')
                ->where('status', 'Selesai')
                ->whereMonth('created_at', $realmonth)
                ->orderBy('created_at', 'ASC')
                ->get();
        $breeds = DB::table('breeds as b')
                ->select('b.price', 'b.service_id', 'b.created_at')
                ->where('status', 'Selesai')
                ->whereMonth('created_at', $realmonth)
                ->orderBy('created_at', 'ASC')
                ->get();
        array_push($joins, $grooms);
        array_push($joins, $hotels);
        array_push($joins, $breeds);
        $service = count($joins);

        $data = [
            'status' => 'success',
            'messages' => 'Berhasil menampilkan laporan'

        ];

        return response()->json([
            'joins' => $joins,
            'data' => $data
        ]);
    }
}
