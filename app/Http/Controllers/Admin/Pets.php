<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pets extends Controller
{
    public function index()
    {
        return view('admin.pets');
    }
}
