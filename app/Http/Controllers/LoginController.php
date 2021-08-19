<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $result = User::where('email', $request->input('email'))->exists();
        if ($result) {
            if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
                if (Auth()->user()->type === "collage") {
                    return redirect()->route('index');
                }
                    return redirect()->route('index');
            }
            return redirect()->back()->with(['type' => 'error', 'message' => 'Invalid password']);
        }
        return redirect()->back()->with(['type' => 'error', 'message' => 'Invalid Username or password']);

    }
}
