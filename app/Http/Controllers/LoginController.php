<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $result = User::where('email', $request->input('username'))->exists();
        if ($result) {
            if (Auth::attempt($request->only('username', 'password'), $request->filled('remember'))) {
                if (Auth()->user()->type === "collage") {
                    return redirect()->route('students');
                }
                return redirect()->route('user.profile.index');
            }
            return redirect()->route('collage')->with(['type' => 'error', 'message' => 'Invalid password']);
        }
        return redirect()->route('collage')->with(['type' => 'error', 'message' => 'Invalid Username or password']);
    }
}
