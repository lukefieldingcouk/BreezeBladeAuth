<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubmitComment extends Component
{
    /**
     * Create a new component instance.
     */
    public $indpost;
    public function __construct($indpost)
    {
        $this->indpost = $indpost;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.submit-comment');
    }
}
