<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class CollageController extends Controller
{
    public function index()
    {
        return view('pages.university.index');
    }

    public function profile()
    {
        return view('pages.university.profile', ['user' => Auth::user()]);
    }

    public function helpSupport()
    {
        return view('pages.university.help-support');
    }
}
