<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pet;

class Dashboard extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function refPets(Request $request)
    {
        $data = Pet::where('user_id', $request['user'])->get();

        $data = [
            'data' => $data,
            'message' => 'Berhasil menampilkan pet pengguna',
            'status' => 'success'
        ];
        return response()->json($data);
    }
}
