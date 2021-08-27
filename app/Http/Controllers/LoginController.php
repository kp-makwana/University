<?php

namespace App\Http\Controllers;

use App\Models\Collage;
use App\Models\university;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.university.login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {

        $university = university::with('user')->where('id', $request->input('university'))->firstOrFail();
        if ($university) {
            if ($university->user->type == 0) {
                if ($university->user->email === $request->input('email')) {
                    if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                        activity('login')
                            ->performedOn(Auth::user())
                            ->log('Login university');
                        return redirect()->route('index');
                    } else {
                        return back()->with(['type' => 'error', 'message' => 'Invalid Password']);
                    }
                }
            }

        }
        return back()->with(['type' => 'error', 'message' => 'Invalid Email Or Password']);
    }

    public function adminLogin(Request $request): \Illuminate\Http\RedirectResponse
    {
        $check = User::where('email', $request->input('email'))->first();

        if ($check) {
            if ($check->type == 1) {
                if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                    activity('login')
                        ->performedOn(Auth::user())
                        ->log('Login Admin');
                    return redirect()->route('admin.index');
                }
            }
        }
        return back()->with(['type' => 'error', 'message' => 'Invalid Email Or Password']);
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        if (Auth::user()->type === 1)
        {
            activity('logout')
                ->performedOn(Auth::user())
                ->log('Admin university');
        }else{
            activity('logout')
                ->performedOn(Auth::user())
                ->log('Logout university');
        }
        Auth::logout();
        return redirect()->route('login');
    }
}
