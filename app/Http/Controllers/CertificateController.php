<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        return view('pages/certificateList');
    }

    public function certificate_form()
    {
        return view('pages/certificate');
    }

    public function addCertificate(Request $request)
    {
        #params
        $student_id = $request->input('roll_no');
        $name = $request->input('name');
        $issue_date = $request->input('issue_date');
        $stream_class = $request->input('stream_class');
        $language = $request->input('language');
        $passing_year = $request->input('passing_year');
        $obtain_class = $request->input('obtain_class');
        $status = $request->input('status');

        $certificate = new Certificate;
        $certificate->student_id = $student_id;
        $certificate->name = $name;
        $certificate->issue_date = $issue_date;
        $certificate->stream_class = $stream_class;
        $certificate->language = $language;
        $certificate->passing_year = $passing_year;
        $certificate->obtain_class = $obtain_class;
        $certificate->status = $status;
        $certificate->save();

        return view('pages/certificateList');
    }
}
