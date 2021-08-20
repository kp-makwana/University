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

    public function studentList(Request $request)
    {
        $students = Student::with('user')->get();
        return view('pages.collage.studentList', ['students' => $students]);
    }

    public function student_form()
    {
        return view('pages.collage.studentForm');
    }

    public function add_student(Request $request): \Illuminate\Http\RedirectResponse
    {
        #param
        $first_name = $request->input('first_name');
        $mid_name = $request->input('mid_name');
        $last_name = $request->input('last_name');
        $stream = $request->input('stream');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $password = date('dmY', strtotime($dob));

        #user create
        $user = new User;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->type = "0";
        $user->save();

        #add student
        $student = new Student;
        $student->user_id = $user->id;
        $student->first_name = $first_name;
        $student->mid_name = $mid_name ?? '';
        $student->last_name = $last_name;
        $student->stream = $stream;
        $student->date_of_birth = $dob;
        $student->gender = $gender;
        $student->phone = $phone;
        $student->address = $address;
        $student->save();

        return redirect()->route('studentList');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function profile()
    {
        return view('pages.collage.profile', ['user' => Auth::user()]);
    }
}
