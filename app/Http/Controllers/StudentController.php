<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('pages/studentList');
    }

    public function student_form()
    {
        return view('pages/studentForm');
    }

    public function add_student(Request $request)
    {
        #param
        $first_name = $request->input('first_name');
        $mid_name = $request->input('mid_name');
        $last_name = $request->input('last_name');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
//        $stream = $request->input('stream');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');

        #add student
        $student = new Student;
        $student->first_name = $first_name;
        $student->mid_name = $mid_name ?? '';
        $student->last_name = $last_name;
        $student->date_of_birth	 = $dob;
        $student->gender = $gender;
        $student->email = $email;
        $student->phone = $phone;
        $student->address = $address;
        $student->save();
        return redirect()->route('users');
    }
}
