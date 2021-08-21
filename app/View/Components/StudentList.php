<?php

namespace App\View\Components;

use App\Models\Student;
use Illuminate\View\Component;

class StudentList extends Component
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public $students;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->students = Student::with('user')->get();
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
