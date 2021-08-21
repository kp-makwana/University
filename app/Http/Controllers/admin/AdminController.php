<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginPage()
    {
        return view('pages.admin.login');
    }

    public function index()
    {
        return view('pages.admin.index');
    }
    public function certificates()
    {
        $certificates = Certificate::all();
        return view('pages.admin.certificateList', ['certificates' => $certificates]);
    }
    public function studentList(Request $request)
    {
        $students = Student::with('user')->get();
        return view('pages.admin.studentList', ['students' => $students]);
    }

    public function student_form()
    {
        return view('pages.admin.studentForm');
    }

}
