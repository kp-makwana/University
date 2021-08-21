<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Collage;
use App\Models\School;
use App\Models\Student;
use App\Models\university;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    //school
    public function schoolList(Request $request)
    {
        $schools = School::with('user')->get();
        return view('pages.admin.schoolList', ['schools' => $schools]);
    }

    public function schoolForm()
    {
        return view('pages.admin.school');
    }

    public function addSchool(Request $request)
    {
        #param
        $name = $request->input('name');
        $code = $request->input('code');
        $contact = $request->input('contact');
        $address = $request->input('address');
        $email = $request->input('email');

        #user create
        $user = new User;
        $user->email = $email;
        $user->password = Hash::make('password');
        $user->type = "0";
        $user->save();

        #school add
        $school = new School;
        $school->user_id = $user->id;
        $school->name = $name;
        $school->code = $code;
        $school->contact = $contact;
        $school->address = $address;
        $school->save();

        return redirect()->route('admin.schoolList');
    }

    //Collage
    public function collageList(Request $request)
    {
        $collages = collage::with('user')->get();
        return view('pages.admin.collageList', ['collages' => $collages]);
    }

    public function collageForm()
    {
        return view('pages.admin.collageForm');
    }

    public function addCollage(Request $request): \Illuminate\Http\RedirectResponse
    {
        #param
        $name = $request->input('name');
        $code = $request->input('code');
        $contact = $request->input('contact');
        $address = $request->input('address');
        $email = $request->input('email');

        #user create
        $user = new User;
        $user->email = $email;
        $user->password = Hash::make('password');
        $user->type = "0";
        $user->save();

        #school add
        $school = new Collage;
        $school->name = $name;
        $school->user_id = $user->id;
        $school->university_id = 1;
        $school->code = $code;
        $school->contact = $contact;
        $school->address = $address;
        $school->save();

        return redirect()->route('admin.collageList');
    }

    //University
    public function universitiesList(Request $request)
    {
        $universities = university::with('user')->get();
        return view('pages.admin.universitiesList', ['universities' => $universities]);
    }

    public function universityForm()
    {
        return view('pages.admin.universityForm');
    }

    public function addUniversity(Request $request)
    {
        #param
        $name = $request->input('name');
        $code = $request->input('code');
        $contact = $request->input('contact');
        $address = $request->input('address');
        $email = $request->input('email');

        #user create
        $user = new User;
        $user->email = $email;
        $user->password = Hash::make('password');
        $user->type = "0";
        $user->save();

        #school add
        $school = new university();
        $school->name = $name;
        $school->user_id = $user->id;
        $school->code = $code;
        $school->contact = $contact;
        $school->address = $address;
        $school->save();

        return redirect()->route('admin.universitiesList');
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


}
