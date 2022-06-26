<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Groom;
use App\Models\User;
use App\Models\Pet;

class Grooms extends Controller
{   
    public $petUsers;

    public function index()
    {   
        $users = User::where('role_id', 3)->get();
        $pets = Pet::all();
        $grooms = Groom::all();
        return view('admin.grooms', compact('grooms', 'users', 'pets'));
    }


    public function fetch()
    {
        $grooms = Groom::with('pets')->get();
        return response()->json([
            'grooms' => $grooms
        ]);
    }

    public function store(Request $request)
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
                'price' => $priceformat,
                'service' => $request['service'],
                'status' => $request['status'],
                'pickup' => $request['pickup'],
            ]);
            if($data->wasRecentlyCreated  ){
                $data = [
                    'status' => 'success',
                    'message' => 'Data grooming berhasil ditambahkan',
                    'data' => $data,
                ];
            } else { 
                $data = [
                    'status' => 'error',
                    'message' => 'Gagal menambahkan data grooming',
                    'data' => $data,
                ];

            }

        }

        return response()->json($data);
    }

    public function edit($id)
    {
        $grooms = Groom::with('pets')->find($id);
        //List user by user id
        $petUsers = Pet::where('user_id', $grooms->pets->user_id )->get();
        if($grooms)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Data grooming berhasil ditampilkan',
                'grooms'=> $grooms,
                'petUser' => $petUsers,
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 'error',
                'message'=>'Data grooming tidak ditemukan'
            ]);
        }
    }

    public function update($id, Request $request)
    {
            $data = $request->all();
            $data = Groom::find($id);
            $data->price = $request['price'];
            $priceformat = number_format($data->price,0,".",".");
            if($data)
            {
                $data->pet_id = $request['petname'];
                $data->service = $request['service'];
                $data->status = $request['status'];
                $data->price = $priceformat;
                $data->update();
                $data = [
                    'data' => $data,
                    'status' => 'success',
                    'message' => 'Data grooming berhasil diubah'
                ];
            }
            else
            { 
                $data = [
                    'data' => $data,
                    'status' => 'error',
                    'message' => 'Gagal mengubah data grooming'
                ];
            }
            return response()->json($data);

    }

    public function destroy($id)
    {
        $grooms = Groom::find($id);
        if($grooms)
        {
            $grooms->delete();
            return response()->json([
                'status'=>'success',
                'message'=>'Berhasil dihapus.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>'error',
                'message'=>'Data tidak ditemukan.'
            ]);
        }
    }

    public function refPets(Request $request)
    {
        $query = DB::table('grooms as g')
                ->select(DB::raw('ROW_NUMBER() OVER (PARTITION BY pet_id ORDER BY id DESC) AS rn, g.*'));

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
}
