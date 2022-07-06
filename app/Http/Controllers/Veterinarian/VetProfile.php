<?php

namespace App\Http\Controllers\Veterinarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class VetProfile extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('veterinarian.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $password = $request['old_password'];
        // dd($hash);
        $data = User::find(Auth::user()->id);
        // dd($request->input('name'));
        $data->name = $request['name'];
        $data->email = $request['email'];
        $data->address = $request['address'];
        $data->phone_number = $request['phone_number'];
        if($request->has('file')){
            $images = $request->file("file");
            $imageName=str_replace(' ', '', time().'_'.$images->getClientOriginalName());
            $images->move(\public_path("/images/user_featured_image"),$imageName);
            $data->photo = $imageName;
        }
        if(Hash::check($password, $data->password)){
            $data->password = Hash::make($request['new_password']);
        }
        $data->update();
        $data->save();
        $data = [
            'data' => $data,
            'status' => 'success',
            'message' => 'Profil berhasil diubah'
        ];

        return response()->json($data);
    }
}
