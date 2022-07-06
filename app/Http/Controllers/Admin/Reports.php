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
        $arrMonth = [];
        if($month == 1){
                $arrMonth = ['Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul','Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        }
        elseif($month == 2){
                $arrMonth = ['Jan', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        }
        elseif($month == 3){
                $arrMonth = ['Jan', 'Feb', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        }
        elseif($month == 4){
                $arrMonth = ['Jan', 'Feb', 'Mar', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        }
        elseif($month == 5){
                $arrMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        }
        elseif($month == 6){
                $arrMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        }
        elseif($month == 7){
                $arrMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        }
        elseif($month == 8){
                $arrMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Sep', 'Okt', 'Nov', 'Des'];
        }
        elseif($month == 9){
                $arrMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Okt', 'Nov', 'Des'];
        }
        elseif($month == 10){
                $arrMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Nov', 'Des'];
        }
        elseif($month == 11){
                $arrMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Des'];
        }
        elseif($month == 12){
                $arrMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov'];
        }
        $joins = [];
        $grooms = DB::table('grooms as g')
                ->select('g.price', 'g.service_id', 'g.created_at')
                ->where('status', 'Selesai')
                ->whereMonth('created_at', $month)
                ->orderBy('created_at', 'ASC')
                ->get();
        // dd($grooms);
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
        $month = 6;
        $realmonth = $month +1;
        // $month = Carbon::now()->format('m');
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
                ->where('status', 'Selesai')
                ->whereMonth('created_at', $month)
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
