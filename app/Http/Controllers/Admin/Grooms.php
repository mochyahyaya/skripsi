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
    public function index()
    {   
        $users = User::all();
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
                'tipe' => 'warning',
                'status' => "Gagal menambahkan data",
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
                'status' => $request['status']
            ]);

            $data = [
                'tipe' => 'success',
                'status' => 'Data berhasil ditambahkan',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }
}
