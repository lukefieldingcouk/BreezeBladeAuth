<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class individualpost extends Component
{
    /**
     * Create a new component instance.
     */
    
     // gets indpost variable from main view posts.indpost.blade.php, passes it to individualpost component. 
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
        return view('components.individualpost');
    }
}
