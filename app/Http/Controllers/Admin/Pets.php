<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Galery;
use App\Models\Pet;
use App\Models\User;
use App\Models\TypePet;

class Pets extends Controller
{
    public function index()
    {
        $pets = Pet::orderBy('id', 'DESC')->get();
        $type = TypePet::all();
        $users = User::with('roles')->where('role_id', '!=', 2)->get();
        return view('admin.pets', compact('pets', 'users', 'type'));
    }

    public function fetch()
    {
        $pets = Pet::with('users', 'typePets')
        ->orderBy('updated_at', 'DESC')
        ->get();
        return response()->json([
            'pets' => $pets
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'race' => 'required',
            'weight' => 'required  | numeric',
            'colour' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'users' => 'required'
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Gagal menambahkan data pet",
                'data' => ''
            ];
        }

        else
        {
            $data = $request->all();
            // dd($data);
            if($request->has("images")){
                $images = $request->file("images");
                $imageName=str_replace(' ', '', time().'_'.$images->getClientOriginalName());
                $images->move(\public_path("/images/featured_image"),$imageName);
                $data = Pet::create([
                    'name' => $request['name'],
                    'race' => $request['race'],
                    'weight' => $request['weight'],
                    'colour' => $request['colour'],
                    'birthday' => $request['birthday'],
                    'gender' => $request['gender'],
                    'user_id' => $request['users'],
                    'type_pet_id' => $request['type'],
                    'filename' => $imageName
                ]);
            }       
            $data->save();

            if($request->has("galery")){
                $files=$request->file("galery");
                foreach($files as $file){
                    $imageName=str_replace(' ', '', time().'_'.$file->getClientOriginalName());
                    $file->move(\public_path("/images/galery"),$imageName);
                    Galery::create([
                        'filename' => $imageName,
                        'pet_id' => $data->id
                    ]);
                }
             }

            $data = [
                'status' => 'success',
                'message' => 'Data pet berhasil ditambahkan',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }

    public function edit($id)
    {
        $pets = Pet::find($id);
        if($pets)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Data pet berhasil ditampilkan',
                'pets'=> $pets,
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 'error',
                'message'=>'Data pet tidak ditemukan'
            ]);
        }
    }

    public function update($id, Request $request)
    {
            $data = $request->all();
            $data = Pet::find($id);
            if($data)
            {
                $data->name = $request['name'];
                $data->race = $request['race'];
                $data->weight = $request['weight'];
                $data->colour = $request['colour'];
                $data->birthday = $request['birthday'];
                $data->gender = $request['gender'];
                $data->user_id = $request['users'];
                $data->type_pet_id = $request['type'];
                $data->update();
                $data = [
                    'data' => $data,
                    'status' => 'success',
                    'message' => 'Data pet berhasil diubah'
                ];
            }
            else
            { 
                $data = [
                    'data' => $data,
                    'status' => 'error',
                    'message' => 'Gagal mengubah data pet'
                ];
            }
            return response()->json($data);
    }

    public function destroy($id)
    {
        $pets = Pet::find($id);
        if($pets)
        {
            $pets->delete();
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
}
