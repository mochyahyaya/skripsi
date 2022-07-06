<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Hotel;
use App\Models\User;
use App\Models\Pet;
use App\Models\Cage;

class Hotels extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 3)->get();
        $pets = Pet::all();
        $hotels = Hotel::all();
        $cages = Cage::all();
        return view('admin.hotels', compact('users', 'pets', 'hotels', 'cages'));
    }

    
    public function fetch()
    {
        $hotels = Hotel::with('pets', 'cages.type_cages')->get();
        $cages = Cage::with('type_cages')->get();
        // dd($hotels);
        return response()->json([
            'hotels' => $hotels
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'petname' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'pickup' => 'required',
            'status' => 'required', 
            'cage_id' => 'required'
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Gagal menambahkan data boarding",
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
                'cage_id' => $request['cage_id'],
                'service_id' => $request['service_id']
            ]);
            $data->save();
            $cage = Cage::find($data->cage_id);
            $cage->counter = $cage->counter + 1;
            $cage->save(); 

            $data = [
                'status' => 'success',
                'message' => 'Data boarding berhasil ditambahkan',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }

    public function edit($id)
    {
        $hotels = Hotel::with('cages.type_cages', 'pets')->find($id);
        //Get pets by user id
        $petUsers = Pet::where('user_id', $hotels->pets->user_id )->get();
        //Get cages where count > counter
        $cages = Cage::with('type_cages')
                ->where('type_cage_id',  $hotels->pets->type_pet_id)
                ->whereRaw('counter < count')
                ->get(); 
        if($hotels)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Data boarding berhasil ditampilkan',
                'hotels'=> $hotels,
                'petUser' => $petUsers,
                'cages' => $cages
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 'error',
                'message'=>'Data boarding tidak ditemukan'
            ]);
        }
    }

    public function update($id, Request $request)
    {
            $data = $request->all();
            $data = Hotel::find($id);
            $cages = Cage::find($data->cage_id);
            if($data->cage_id == $request['cage_id'])
            {
                $start = new Carbon($request['start_at']);
                $end = new Carbon($request['end_at']);
                $day =  $start->diff($end)->format('%a');
                $price = $day * 20000;
                $priceformat = number_format($price,0,".",".");

                $data->pet_id = $request['petname'];
                $data->start_at = $request['start_at'];
                $data->end_at = $request['end_at'];
                $data->status = $request['status'];
                $data->cage_id = $request['cage_id'];
                $data->price = $price;
                $data->update();
                $data->save();

                if($data->status == 'Selesai'){
                    if($cages->counter > 0){
                        $cages->counter = $cages->counter - 1;
                        $cages->save();
                    }
                }
                $data = [
                    'data' => $data,
                    'status' => 'success',
                    'message' => 'Data boarding berhasil diubah'
                ];
            }
            elseif($data->cage_id != $request['cage_id']){
                $start = new Carbon($request['start_at']);
                $end = new Carbon($request['end_at']);
                $day =  $start->diff($end)->format('%a');
                $price = $day * 20000;
                $priceformat = number_format($price,0,".",".");

                if($cages != null){
                    if($cages->counter > 0){
                        $cages->counter = $cages->counter - 1;
                        $cages->save();
                    }
                } else {

                }

                $data->pet_id = $request['petname'];
                $data->start_at = $request['start_at'];
                $data->end_at = $request['end_at'];
                $data->status = $request['status'];
                $data->cage_id = $request['cage_id'];
                $data->price = $priceformat;
                $data->update();
                $data->save();
                
                $updateCountCage = Cage::find($data->cage_id);
                if($updateCountCage->counter < $updateCountCage->count ) {
                    $updateCountCage->counter = $updateCountCage->counter + 1;
                    $updateCountCage->save();
                }

                if($data->status == 'Selesai'){
                    if($updateCountCage->counter > 0){
                        $updateCountCage->counter = $updateCountCage->counter - 1;
                        $updateCountCage->save();
                    }
                }

                $data = [
                    'data' => $data,
                    'status' => 'success',
                    'message' => 'Data boarding berhasil diubah'
                ];
            }
            else
            { 
                $data = [
                    'data' => $data,
                    'status' => 'error',
                    'message' => 'Gagal mengubah data boarding'
                ];
            }
            return response()->json($data);
    }

    public function destroy($id)
    {
        $hotels = Hotel::find($id);
        $cages = Cage::find($hotels->cage_id);
        if($hotels)
        {
            if($cages->counter > 0 ){
                $cages->counter = $cages->counter - 1;
            }
            $hotels->delete();
            return response()->json([
                'status'=>'success',
                'message'=>'Berhasil dihapus'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>'error',
                'message'=>'Data tidak ditemukan'
            ]);
        }
    }

    public function refPets(Request $request)
    {
        $query = DB::table('hotels as h')
                ->select(DB::raw('ROW_NUMBER() OVER (PARTITION BY pet_id ORDER BY id DESC) AS rn, h.*'));

        $data = DB::table('pets as p')
                ->select('p.*', 'p.id as petsid')
                ->withExpression('pos_pets', $query)
                ->leftJoin('pos_pets', 'p.id', '=', 'pos_pets.pet_id')
                ->where('p.user_id', $request['user'])
                ->whereNull('status')
                ->orWhere(function ($join) use($request){
                    $join
                    ->where('rn', 1)
                    ->where('status', 'Selesai');
                })
                ->get();
        
        // dd($data);
        $data = [
            'data' => $data,
            'message' => 'Berhasil menampilkan pet pengguna',
            'status' => 'success'
        ];
        return response()->json($data);
    }

    public function refCages(Request $request){
        $pets = Pet::find($request['cage']);
        $data = Cage::with('type_cages')
                ->where('type_cage_id', $pets->type_pet_id)
                ->whereRaw('counter < count')
                ->get();
        // dd($data);

        $data = [
            'data' => $data,
            'message' => 'Berhasil menampilkan kandang', 
            'status' => 'success'
        ];
        return response()->json($data);
    }
}
