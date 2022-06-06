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
        $updatepet = $this->petUsers;
        return view('admin.grooms', compact('grooms', 'users', 'pets', 'updatepet'));
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
                'status' => $request['status'],
                'pickup' => $request['pickup'],
            ]);

            $data = [
                'tipe' => 'success',
                'status' => 'Data berhasil ditambahkan',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }

    public function edit($id)
    {
        $grooms = Groom::find($id);
        $users = Pet::where('pet_id', $grooms->pet_id)->get();
        $pets = Pet::where('user_id', $users);
        $this->petUsers = $pets;

        if($grooms)
        {
            $data = [
                'data' => $grooms,
                'pets' => $pets,
            ];
        }

        else
        {
            $data = [
                'data' => $grooms,
                'pets' => $pets
            ];
        }
        return response()->json($data);
    }

    public function update()
    {

    }

    public function destroy()
    {
        
    }
}
