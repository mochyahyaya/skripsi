<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Hotel;
use App\Models\User;
use App\Models\Pet;

class Hotels extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 3)->get();
        $pets = Pet::all();
        $hotels = Hotel::all();
        return view('admin.hotels', compact('users', 'pets', 'hotels'));
    }

    
    public function fetch()
    {
        $hotels = Hotel::with('pets')->get();
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
            'status' => 'required'
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
                'price' => $priceformat,
                'status' => $request['status'],
                'pickup' => $request['pickup'],
            ]);

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
        $hotels = Hotel::find($id);
        if($hotels)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Data boarding berhasil ditampilkan',
                'hotels'=> $hotels,
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
            if($data)
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
                $data->price = $priceformat;
                $data->update();
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
        if($hotels)
        {
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
}
