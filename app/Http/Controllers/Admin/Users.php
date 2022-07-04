<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;

class Users extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users', compact('users', 'roles'));
    }

    public function fetch()
    {
        $users = User::with('roles')->get();
        return response()->json([
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'address' => 'required',
            'phone_number' => 'required | numeric',
            'role_id' => 'required'
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Gagal menambahkan data pengguna",
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
                $images->move(\public_path("/images/user_featured_image"),$imageName);
                $data = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'address' => $request['address'],
                    'phone_number' => $request['phone_number'],
                    'role_id' => $request['role_id'],
                    'photo' => $imageName
                ]);
            }
            $data = [
                'status' => 'success',
                'message' => 'Data pengguna berhasil ditambahkan',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }

    public function edit($id)
    {
        $users = User::find($id);
        if($users)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Data pengguna berhasil ditampilkan',
                'users'=> $users,
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 'error',
                'message'=>'Data pengguna tidak ditemukan'
            ]);
        }
    }

    public function update($id, Request $request)
    {
            $data = $request->all();
            $data = User::find($id);
            if($data)
            {
                $data->name = $request['name'];
                $data->email = $request['email'];
                $data->address = $request['address'];
                $data->phone_number = $request['phone_number'];
                $data->role_id = $request['role_id'];
                $data->update();
                $data = [
                    'data' => $data,
                    'status' => 'success',
                    'message' => 'Data pengguna berhasil diubah'
                ];
            }
            else
            { 
                $data = [
                    'data' => $data,
                    'status' => 'error',
                    'message' => 'Gagal mengubah data pengguna'
                ];
            }
            return response()->json($data);
    }

    public function destroy($id)
    {
        $users = User::find($id);
        if($users)
        {
            $users->delete();
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
