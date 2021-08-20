<?php

namespace App\Http\Controllers;

use App\Models\Collage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.collage.login');
    }
    public function login(Request $request)
    {
        $collage = Collage::with('user')->where('id', $request->input('collage'))->firstOrFail();
        if ($collage->user->email === $request->input('email')) {
            $result = User::where('email', $request->input('email'))->exists();
            if ($result) {
                if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
//                    if (Auth()->user()->type === 1) {
//                        return redirect()->route('index');
//                    }
                    return redirect()->route('index');
                }
                return redirect()->back()->with(['type' => 'Password', 'message' => 'Invalid password']);
            }
        }
            return redirect()->back()->with(['type' => 'error', 'message' => 'Invalid Username or password']);

    }
}
