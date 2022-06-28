<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Breed;
use App\Models\User;
use App\Models\Pet;
use App\Models\Cage;


class Breeds extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 3)->get();
        $pets = Pet::all();
        $breeds = Breed::all();
        $petAdmin = Pet::where('user_id', 1)->where('gender', 'Jantan')->get();
        return view('admin.breeds', compact('users', 'pets', 'breeds', 'petAdmin'));
    }

    public function fetch()
    {
        $breeds = Breed::with('pets')->get();
        return response()->json([
            'breeds' => $breeds
        ]);
    }

    public function store(Request $request)
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
                'meesage' => "Gagal menambahkan data breeding",
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
            ]);
            $data->save();
            $cage = Cage::find($data->cage_id);
            // dd($cage);
            $cage->counter = $cage->counter + 2;
            $cage->save(); 

            $data = [
                'status' => 'success',
                'message' => 'Data breeding berhasil ditambahkan',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }

    public function edit($id)
    {
        $breeds = Breed::with('cages.type_cages', 'pets')->find($id);
        $petUsers = Pet::where('user_id', $breeds->pets->user_id )->get();
        $cages = Cage::with('type_cages')
                ->where('type_cage_id',  3)
                ->whereRaw('counter < count')
                ->get(); 
        if($breeds)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Data breeding berhasil ditampilkan',
                'breeds'=> $breeds,
                'petUser' => $petUsers,
                'cages' => $cages
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 'error',
                'message'=>'Data breeding tidak ditemukan'
            ]);
        }
    }

    public function update($id, Request $request)
    {
            $data = $request->all();
            $data = Breed::find($id);
            $cages = Cage::find($data->cage_id);
            if($data->cage_id == $request['cage_id'])
            {
                if($request['status'] == 'Selesai'){
                    $start = new Carbon($request['start_at']);
                    $end = Carbon::now();
                    $day =  $start->diff($end)->format('%a');
                    $price = $day * 20000; 
                    $priceformat = number_format($price,0,".",".");
            
                    $data->pet_id = $request['petname'];
                    $data->pet_male = $request['petMale'];
                    $data->start_at = $request['start_at'];
                    $data->end_at = $end;
                    $data->status = $request['status'];
                    $data->price = $priceformat;
                    $data->update();
                    $data->save();

                    if($cages->counter > 0){
                        $cages->counter = $cages->counter - 2;
                        $cages->save();
                    }
                    $data = [
                        'data' => $data,
                        'status' => 'success',
                        'message' => 'Data boarding berhasil diubah'
                    ];
                }

                else {

                    $data->pet_id = $request['petname'];
                    $data->pet_male = $request['petMale'];
                    $data->start_at = $request['start_at'];
                    $data->status = $request['status'];
                    $data->update();
                    $data = [
                        'data' => $data,
                        'status' => 'success',
                        'message' => 'Data boarding berhasil diubah'
                    ];
                }
            }
            elseif($data->cage_id != $request['cage_id']){
                if($request['status'] == 'Selesai'){
                    $start = new Carbon($request['start_at']);
                    $end = Carbon::now();
                    $day =  $start->diff($end)->format('%a');
                    $price = $day * 20000; 
                    $priceformat = number_format($price,0,".",".");


                    if($cages->counter > 0){
                        $cages->counter = $cages->counter - 2;
                        $cages->save();
                    }
            
                    $data->pet_id = $request['petname'];
                    $data->pet_male = $request['petMale'];
                    $data->start_at = $request['start_at'];
                    $data->end_at = $end;
                    $data->status = $request['status'];
                    $data->cage_id = $request['cage_id'];
                    $data->price = $priceformat;
                    $data->update();
                    $data->save();

                    // $updateCountCage = Cage::find($data->cage_id);
                    // if($updateCountCage->counter < $updateCountCage->count ) {
                    //     $updateCountCage->counter = $updateCountCage->counter + 2;
                    //     $updateCountCage->save();
                    // }

                    $data = [
                        'data' => $data,
                        'status' => 'success',
                        'message' => 'Data boarding berhasil diubah'
                    ];
                }

                else {
                    
                    if($cages->counter > 0){
                        $cages->counter = $cages->counter - 2;
                        $cages->save();
                    }

                    $data->pet_id = $request['petname'];
                    $data->pet_male = $request['petMale'];
                    $data->start_at = $request['start_at'];
                    $data->status = $request['status'];
                    $data->cage_id = $request['cage_id'];
                    $data->update();

                    $updateCountCage = Cage::find($data->cage_id);
                    if($updateCountCage->counter < $updateCountCage->count ) {
                        $updateCountCage->counter = $updateCountCage->counter + 2;
                        $updateCountCage->save();
                    }

                    $data = [
                        'data' => $data,
                        'status' => 'success',
                        'message' => 'Data breeding berhasil diubah'
                    ];

                }
            } 
            else { 
                $data = [
                    'data' => $data,
                    'status' => 'error',
                    'message' => 'Gagal mengubah data breeding'
                ];
            }
            return response()->json($data);
    }

    public function destroy($id)
    {
        $breeds = Breed::find($id);
        $cages = Cage::find($breeds->cage_id);
        if($breeds)
        {
            if($cage->counter > 0) {
                $cages->counter = $cages->counter - 2;
            }
            $breeds->delete();
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
        $query = DB::table('breeds as b')
                ->select(DB::raw('ROW_NUMBER() OVER (PARTITION BY pet_id ORDER BY id DESC) AS rn, b.*'));

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
                ->where('type_cage_id', 3)
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
