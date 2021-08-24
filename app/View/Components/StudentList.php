<?php

namespace App\View\Components;

use App\Models\Collage;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class StudentList extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public $students;
    /**
     * @var Collage[]|\Illuminate\Database\Eloquent\Collection
     */
    public $collages;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user()->type;
        if ($user == 1) {
            $this->students = Student::with('user')->get();
        } else {
            $this->students = Student::whereHas('collage',function ($query){
                $query->where('university_id',Auth::user()->university->id);
            })
                ->with('user')
                ->orderBy('id', 'desc')
                ->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.student-list');
    }
}
