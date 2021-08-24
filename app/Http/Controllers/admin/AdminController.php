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
use Illuminate\Support\Facades\Auth;
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
        $certificates = Certificate::orderBy('id', 'desc')->get();
        return view('pages.admin.certificateList', ['certificates' => $certificates]);
    }

    //school
    public function schoolList(Request $request)
    {
        $schools = School::with('user')->orderBy('id', 'desc')->get();
        return view('pages.admin.schoolList', ['schools' => $schools]);
    }

    public function schoolForm()
    {
        return view('pages.admin.school');
    }

    public function addSchool(Request $request): \Illuminate\Http\RedirectResponse
    {
        #param
        $email = $request->input('email');

        #user create
        $user = $this->user($email);

        #school add
        $model = new School();
        $this->add($request, $model, $user->id);

        return redirect()->route('admin.schoolList');
    }

    //Collage
    public function collageList(Request $request)
    {
        $collages = collage::with('user')->orderBy('id', 'desc')->get();
        return view('pages.admin.collageList', ['collages' => $collages]);
    }

    public function collageForm()
    {
        return view('pages.admin.collageForm');
    }

    public function addCollage(Request $request): \Illuminate\Http\RedirectResponse
    {
        #param
        $email = $request->input('email');

        #user create
        $user = $this->user($email);

        #school add
        $model = new Collage();
        $model->university_id = 1;
        $this->add($request, $model, $user->id);

        return redirect()->route('admin.collageList');
    }

    //University
    public function universitiesList(Request $request)
    {
        $universities = university::with('user')->orderBy('id', 'desc')->get();
        return view('pages.admin.universitiesList', ['universities' => $universities]);
    }

    public function universityForm()
    {
        return view('pages.admin.universityForm');
    }

    public function addUniversity(Request $request): \Illuminate\Http\RedirectResponse
    {
        #param
        $email = $request->input('email');

        #user create
        $user = $this->user($email);

        #school add
        $model = new university();
        $this->add($request, $model, $user->id);

        return redirect()->route('admin.universitiesList');
    }

    #student
    public function studentList(Request $request)
    {
        $students = Student::with('user')->orderBy('id', 'desc')->get();
        return view('pages.admin.studentList', ['students' => $students]);
    }

    public function student_form()
    {
        return view('pages.admin.studentForm');
    }

    protected function user($email): User
    {
        $user = new User;
        $user->email = $email;
        $user->password = Hash::make('password');
        $user->type = "0";
        $user->save();

        return $user;
    }

    protected function add($request, $model, $user_id)
    {
        $name = $request->input('name');
        $code = $request->input('code');
        $contact = $request->input('contact');
        $address = $request->input('address');

        #add
        $model->name = $name;
        $model->user_id = $user_id;
        $model->code = $code;
        $model->contact = $contact;
        $model->address = $address;
        $model->save();
    }

}
