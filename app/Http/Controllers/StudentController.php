<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckEmail;
use App\Models\Collage;
use App\Models\Student;
use App\Models\university;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function studentList(Request $request)
    {
        return view('pages.university.studentList');
    }

    public function student_form()
    {
        $user = Auth::user()->type;
        if ($user == 1) {
            $students = Student::with('user')->get();
        } else {
            $students = Student::whereHas('university',function ($query){
                $query->where('university_id',Auth::user()->university->id);
            })
                ->with('user')
                ->orderBy('id', 'desc')
                ->get();
        }
        return view('pages.university.studentForm',['students'=>$students]);
    }

    public function add_student(CheckEmail $request): \Illuminate\Http\RedirectResponse
    {
        #param
        $collage_id = $request->input('university') ?? 1;
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
        $collage = Collage::find($collage_id);

        #user create
        $user = new User;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->type = "0";
        $user->save();

        #add student
        $student = new Student;
        $student->user_id = $user->id;
        $student->collage_id = $collage_id;
        $student->university_id = $collage->university_id;
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

}
