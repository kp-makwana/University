<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CollageController extends Controller
{
    public function index()
    {
        return view('pages.collage.index');
    }

    public function profile()
    {
        return view('pages.collage.profile', ['user' => Auth::user()]);
    }
}
