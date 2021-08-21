<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Collage;
use App\Models\School;
use App\Models\Student;
use App\Models\university;
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

    #student
    public function studentList(Request $request)
    {
        $students = Student::with('user')->get();
        return view('pages.admin.studentList', ['students' => $students]);
    }

    public function student_form()
    {
        return view('pages.admin.studentForm');
    }

    //school
    public function schoolList(Request $request)
    {
        $schools = School::all();
        return view('pages.admin.schoolList', ['schools' => $schools]);
    }

    public function schoolForm()
    {
        return view('pages.admin.school');
    }

    public function addSchool()
    {
        dd('call');
    }

    //Collage
    public function collageList(Request $request)
    {
        $collages = collage::all();
        return view('pages.admin.collageForm.blade.php', ['collages' => $collages]);
    }

    public function collageForm()
    {
        return view('pages.admin.collageForm');
    }

    public function addCollage()
    {
        dd('call');
    }

    //University
    public function universitiesList(Request $request)
    {
        $universities = university::all();
        return view('pages.admin.universitiesList', ['universities' => $universities]);
    }

    public function universityForm()
    {
        return view('pages.admin.universityForm');
    }

    public function addUniversity()
    {
        dd('call');
    }

    public function helpSupport()
    {
        return view('pages.admin.help-support');
    }

}
