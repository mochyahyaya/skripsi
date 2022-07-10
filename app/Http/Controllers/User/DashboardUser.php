<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Pet;
use App\Models\Groom;
use App\Models\Hotel;
use App\Models\Breed;
use App\Models\Testimonial;

class DashboardUser extends Controller
{
    public function index()
    {
        $queryGrooms = DB::table('grooms as g')
        ->select(DB::raw('ROW_NUMBER() OVER (PARTITION BY pet_id ORDER BY id DESC) AS rn, g.*'));

        $petsGrooms = DB::table('pets as p')
        ->select('p.*', 'p.id as petsid')
        ->withExpression('pos_pets', $queryGrooms)
        ->leftJoin('pos_pets', 'p.id', '=', 'pos_pets.pet_id')
        ->where('p.user_id', Auth::user()->id)
        ->whereNull('status')
        ->orWhere(function ($join){
            $join
            ->where('rn', 1)
            ->where('status', 'Selesai');
        })
        ->get();

        $queryHotels = DB::table('hotels as h')
        ->select(DB::raw('ROW_NUMBER() OVER (PARTITION BY pet_id ORDER BY id DESC) AS rn, h.*'));

        $petsHotels = DB::table('pets as p')
        ->select('p.*', 'p.id as petsid')
        ->withExpression('pos_pets', $queryHotels)
        ->leftJoin('pos_pets', 'p.id', '=', 'pos_pets.pet_id')
        ->where('p.user_id', Auth::user()->id)
        ->whereNull('status')
        ->orWhere(function ($join){
            $join
            ->where('rn', 1)
            ->where('status', 'Selesai');
        })
        ->get();

        $queryBreeds = DB::table('breeds as b')
        ->select(DB::raw('ROW_NUMBER() OVER (PARTITION BY pet_id ORDER BY id DESC) AS rn, b.*'));

        $petsBreeds = DB::table('pets as p')
        ->select('p.*', 'p.id as petsid')
        ->withExpression('pos_pets', $queryBreeds)
        ->leftJoin('pos_pets', 'p.id', '=', 'pos_pets.pet_id')
        ->where('p.user_id', Auth::user()->id)
        ->whereNull('status')
        ->orWhere(function ($join){
            $join
            ->where('rn', 1)
            ->where('status', 'Selesai');
        })
        ->get();
        
        $queryBreeds2 = DB::table('breeds as b')
        ->select(DB::raw('ROW_NUMBER() OVER (PARTITION BY pet_male ORDER BY id DESC) AS rn, b.*'));

        $petAdmin = DB::table('pets as p')
        ->select('p.*', 'p.id as petsid')
        ->withExpression('pos_pets', $queryBreeds2)
        ->leftJoin('pos_pets', 'p.id', '=', 'pos_pets.pet_male')
        ->where('p.user_id', 1)
        ->whereNull('status')
        ->orWhere(function ($join){
            $join
            ->where('rn', 1)
            ->where('status', 'Selesai');
        })
        ->get();

        $testi = Testimonial::where('type', 'Masukan')->where('show', 'Tampilkan')->get();

        $pets =  $petAdmin = $petAdmin = Pet::where('user_id', 1)->where('gender', 'Jantan')->get();

        return view('user.dashboard', compact('petsGrooms', 'petAdmin', 'petsHotels', 'petsBreeds', 'pets', 'testi'));
    }

    public function grooms(Request $request)
    {
        $validated = $request->validate([
            'petname' => 'required',
            'service' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Terdapat inputan kosong",
                'data' => ''
            ];
        }

        else
        {
            $data = $request->all();
            $price = $request['price'];
            $priceformat = number_format($price,0,".",".");
            $data = Groom::create([
                'pet_id' => $request['petname'],
                'price' => $price,
                'service' => $request['service'],
                'status' => $request['status'],
                'pickup' => $request['pickup'],
                'service_id' => $request['service_id']
            ]);
            if($data->wasRecentlyCreated  ){
                $data = [
                    'status' => 'success',
                    'message' => 'Berhasil melakukan grooming',
                    'data' => $data,
                ];
            } else { 
                $data = [
                    'status' => 'error',
                    'message' => 'Gagal melakukan grooming',
                    'data' => $data,
                ];

            }

        }

        return response()->json($data);
    }

    public function hotels(Request $request)
    {
        $validated = $request->validate([
            'petname' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'pickup' => 'required',
            'status' => 'required', 
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Gagal melakukan boarding",
                'data' => ''
            ];
        }

        else
        {
            $data = $request->all();
            $start = new Carbon($request['start_at']);
            $end = new Carbon($request['end_at']);
            $day =  $start->diff($end)->format('%a');
            $price = $day * 20000;
            $priceformat = number_format($price,0,".",".");
            // dd($price);
            $data = Hotel::create([
                'pet_id' => $request['petname'],
                'start_at'=> $request['start_at'],
                'end_at'=> $request['end_at'],
                'price' => $price,
                'status' => $request['status'],
                'pickup' => $request['pickup'],
                'service_id' => $request['service_id']
            ]);
            $data->save();

            $data = [
                'status' => 'success',
                'message' => 'Berhasil melakuakn boarding',
                'data' => $data,
            ];
        }
        return response()->json($data);
    }

    public function breeds(Request $request)
    {
        $validated = $request->validate([
            'petname' => 'required',
            'petmale' => 'required',
            'start_at' => 'required',
            'pickup' => 'required',
            'status' => 'required',
            'price' => 'nullable',
            'end_at' => 'nullable',
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Gagal melakukan boarding",
                'data' => ''
            ];
        }

        else
        {
            $data = $request->all();
            $data = Breed::create([
                'pet_id' => $request['petname'],
                'pet_male' => $request['petmale'],
                'start_at'=> $request['start_at'],
                'status' => $request['status'],
                'pickup' => $request['pickup'],
                'cage_id' => $request['cage_id'],
                'price' => 0,
                'service_id' => $request['service_id']
            ]);

            $data = [
                'status' => 'success',
                'message' => 'Berhasil melakukan breeding',
                'data' => $data,
            ];
        }
        return response()->json($data);
    }

    public function testimonial(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'messages' => 'required',
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Gagal menambahkan keluhan/masukan",
                'data' => ''
            ];
        }

        else
        {
            $data = Testimonial::create([
                'name' => $request['name'],
                'email'=> $request['email'],
                'type'=> $request['subject'],
                'messages' => $request['messages'],
                'show' => 'Tidak Tampilkan',
            ]);


            $data = [
                'status' => 'success',
                'message' => 'Keluhan/Masukan berhasil dikirim',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }
}
