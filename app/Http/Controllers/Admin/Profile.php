<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class Profile extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('admin.profile', compact('user'));
    }
}
