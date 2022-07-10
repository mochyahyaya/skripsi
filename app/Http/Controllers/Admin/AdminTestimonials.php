<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Testimonial;

class AdminTestimonials extends Controller
{
    public function index()
    {
        $testi = Testimonial::all();
        return view('admin.testimonials');
    }

    public function fetch()
    {
        $testi = Testimonial::orderBy('updated_at', 'DESC')
        ->get();
        return response()->json([
            'testimonials' => $testi
        ]);
    }

    public function edit($id)
    {
        $testi = Testimonial::find($id);
        if($testi)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Data testimoni berhasil ditampilkan',
                'testimonials'=> $testi,
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 'error',
                'message'=>'Data grooming tidak ditemukan'
            ]);
        }
    }

    public function update($id, Request $request)
    {
            $data = $request->all();
            $data = Testimonial::find($id);
            if($data)
            {
                $data->show = $request['status'];
                $data->update();
                $data = [
                    'data' => $data,
                    'status' => 'success',
                    'message' => 'Data testimoni berhasil diubah'
                ];
            }
            else
            { 
                $data = [
                    'data' => $data,
                    'status' => 'error',
                    'message' => 'Gagal mengubah data testimoni'
                ];
            }
            return response()->json($data);
    }

    public function destroy($id)
    {
        $testi = Testimonial::find($id);
        if($testi)
        {
            $testi->delete();
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
