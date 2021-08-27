<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Collage;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        return view('pages.university.certificateList');
    }

    public function certificate_form()
    {
        $user = Auth::user()->type;
        if ($user == 1) {
            $students = Student::with('user')->get();
        } else {
            $students = Student::whereHas('collage',function ($query){
                $query->where('university_id',Auth::user()->university->id);
            })
                ->with('user')
                ->orderBy('id', 'desc')
                ->get();
        }
        $collages = Collage::where('university_id',Auth::user()->university->id)->get();
        return view('pages.university.certificate',['collages'=>$collages,'students'=>$students]);
    }

    public function addCertificate(Request $request)
    {
        #params
        $student_id = $request->input('roll_no');
        $collage_id = $request->input('collage');
        $name = $request->input('name');
        $issue_date = $request->input('issue_date');
        $stream_class = $request->input('stream_class');
        $language = $request->input('language');
        $passing_year = $request->input('passing_year');
        $obtain_class = $request->input('obtain_class');
        $status = $request->input('status');

        $certificate = new Certificate;
        $certificate->student_id = $student_id;
        $certificate->Collage_id = $collage_id;
        $certificate->name = $name;
        $certificate->issue_date = $issue_date;
        $certificate->stream_class = $stream_class;
        $certificate->language = $language;
        $certificate->passing_year = $passing_year;
        $certificate->obtain_class = $obtain_class;
        $certificate->status = $status;
        $certificate->save();
        activity('add')
            ->performedOn($certificate)
            ->log('Add new Certificate');
        return redirect()->route('certificates');
    }
}
