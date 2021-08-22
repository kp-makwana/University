<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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

    public function helpSupport()
    {
        return view('pages.collage.help-support');
    }
}
