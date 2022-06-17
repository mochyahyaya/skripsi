<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Groom;
use App\Models\User;
use App\Models\Pet;

class Grooms extends Controller
{   
    public $petUsers;

    public function index()
    {   
        $users = User::where('role_id', 3)->get();
        $grooms = Groom::all();
        $pets = Pet::all();
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
                'meesage' => "Gagal menambahkan data grooming",
                'data' => ''
            ];
        }

        else
        {
            $data = $request->all();
            $data = Groom::create([
                'pet_id' => $request['petname'],
                'price' => $request['price'],
                'service' => $request['service'],
                'status' => $request['status'],
                'pickup' => $request['pickup'],
            ]);

            $data = [
                'status' => 'success',
                'message' => 'Data grooming berhasil ditambahkan',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }

    public function edit($id)
    {
        $grooms = Groom::find($id);
        if($grooms)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Data grooming berhasil ditampilkan',
                'grooms'=> $grooms,
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
            if($data)
            {
                $data->pet_id = $request['petname'];
                $data->service = $request['service'];
                $data->status = $request['status'];
                $data->update();
                $data = [
                    'data' => $data,
                ];
            }
            else
            {
                $data = [
                    'data' => $data,
                ];
            }
            return response()->json($data);

    }

    public function destroy($id)
    {
        $user = Groom::find($id);
        if($user)
        {
            $user->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Berhasil dihapus.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Data tidak ditemukan.'
            ]);
        }

    }
}
