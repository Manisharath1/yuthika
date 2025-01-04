<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectAdd extends Component
{
    /**
     * Create a new component instance.
     */
    public $users;
    public function __construct($users)
    {
        //
        $this->users = $users;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project-add');
    }
}
