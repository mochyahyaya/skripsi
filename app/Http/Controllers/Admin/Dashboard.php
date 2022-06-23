<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pet;
use App\Models\Cage;
use App\Models\Groom;
use App\Models\Hotel;
use App\Models\Breed;

class Dashboard extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function refPets(Request $request)
    {
        $grooms = Groom::where('status', 'Selesai')->latest()->first();
        $data = Pet::where('user_id', $request['user'])
                ->leftJoin('grooms', 'pets.id', '=', 'grooms.pet_id')
                ->where(function ($query) {
                    $query
                    ->where('grooms.status', '=', 'Selesai');
                })
                ->get();
        
        // $data = Pet::with('typePets')->where('user_id', $request['user'])->get();
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
