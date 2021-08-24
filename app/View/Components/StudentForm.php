<?php

namespace App\View\Components;

use App\Models\Collage;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class StudentForm extends Component
{
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
            $this->collages = Collage::all();
        }else{
            $this->collages = Collage::where('university_id',Auth::user()->university->id)->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.student-form');
    }
}
