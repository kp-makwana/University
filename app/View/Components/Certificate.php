<?php

namespace App\View\Components;

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
        $this->certificates = \App\Models\Certificate::all();
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
