<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

class Testimonials extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'messages' => 'required',
        ]);

        if(!$validated)
        {
            $data = [
                'status' => 'error',
                'meesage' => "Gagal menambahkan keluhan/masukan",
                'data' => ''
            ];
        }

        else
        {
            $data = Testimonial::create([
                'name' => $request['name'],
                'email'=> $request['email'],
                'type'=> $request['subject'],
                'messages' => $price,
                'show' => 'Tidak Tampilkan',
            ]);


            $data = [
                'status' => 'success',
                'message' => 'Keluhan/Masukan berhasil dikirim',
                'data' => $data,
            ];
        }

        return response()->json($data);
    }
}
