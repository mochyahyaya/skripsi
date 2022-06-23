<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pet;
use App\Models\Cage;

class Dashboard extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function refPets(Request $request)
    {
        $data = Pet::with('typePets')->where('user_id', $request['user'])->get();
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
