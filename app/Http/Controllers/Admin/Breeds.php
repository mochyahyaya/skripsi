<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Breed;
use App\Models\User;
use App\Models\Pet;


class Breeds extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 3)->get();
        $pets = Pet::all();
        $breeds = Breed::all();
        $petAdmin = Pet::where('user_id', 1)->get();
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
                'price' => 0,
            ]);

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
        $breeds = Breed::find($id);
        if($breeds)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Data breeding berhasil ditampilkan',
                'breeds'=> $breeds,
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
            if($data)
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
        $breeds = Breed::find($id);
        if($breeds)
        {
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
        $grooms = Breed::where('status', 'Selesai')->latest()->first();
        $data = Pet::select('*', 'pets.id as idpets', 'breeds.id as idgrooms')
                ->leftjoin('grooms', 'pets.id', '=', 'grooms.pet_id')
                ->where('pets.user_id', $request['user'])
                ->whereNull('grooms.status')
                ->orWhere('grooms.status', 'selesai')
                ->get();
        
        // dd($data);
        $data = [
            'data' => $data,
            'message' => 'Berhasil menampilkan pet pengguna',
            'status' => 'success'
        ];
        return response()->json($data);
    }
}
