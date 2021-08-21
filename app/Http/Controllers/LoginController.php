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
        if ($collage) {
            if ($collage->user->type == 0) {
                if ($collage->user->email === $request->input('email')) {
                    if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                        return redirect()->route('index');
                    } else {
                        return redirect()->back()->with(['type' => 'error', 'message' => 'Invalid Password']);
                    }
                }
            }

        }
        return redirect()->back()->with(['type' => 'error', 'message' => 'Invalid Email Or Password']);
    }

    public function adminLogin(Request $request)
    {
        $check = User::where('email', $request->input('email'))->first();

        if ($check) {
            if ($check->type == 1) {
                if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                    return redirect()->route('admin.index');
                }
            }
        }
        return redirect()->back()->with(['type' => 'error', 'message' => 'Invalid Email Or Password']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
