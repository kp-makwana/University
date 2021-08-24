<?php

namespace App\View\Components;

use App\Models\Collage;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Certificate extends Component
{
    /**
     * @var \App\Models\Certificate[]|\Illuminate\Database\Eloquent\Collection
     */
    public $certificates;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->certificates = \App\Models\Certificate::whereHas('collage',function ($query){
            $query->where('university_id',Auth::user()->university->id);
        })
            ->with('student')
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.certificate');
    }
}
