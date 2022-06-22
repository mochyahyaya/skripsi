<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cage;
use App\Models\TypeCage;

class Cages extends Controller
{
    public function index()
    {
        $cages = Cage::all();
        $typeCages = TypeCage::all();
        return view('admin.cages', compact('cages', 'typeCages'));
    }

    public function fetch()
    {
        $cages = Cage::with('type_cages')->get();
        // dd($cages); 
        return response()->json([
            'cages' => $cages
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'number' => 'required|numeric',
            'count' => 'required|numeric',
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Gagal menambahkan data kandang",
                'data' => ''
            ];
        }

        else
        {
            $data = $request->all();
            // dd($data);
            $data = Cage::create([
                'type_cage_id' => $request['type'],
                'number' => $request['number'],
                'count' => $request['count'],
                'counter' => $request['counter'],
            ]);

            $data = [
                'status' => 'success',
                'message' => 'Data kandang berhasil ditambahkan',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }

    public function edit($id)
    {
        $cages = Cage::find($id);
        if($cages)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Data kandang berhasil ditampilkan',
                'cages'=> $cages,
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 'error',
                'message'=>'Data kandang tidak ditemukan'
            ]);
        }
    }
}
