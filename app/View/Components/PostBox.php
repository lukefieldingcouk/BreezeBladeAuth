<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class PostBox extends Component
{
    /**
     * Create a new component instance.
     */


    /** $post variable from main view (postfeed.blade.php - defined there by PostController.php ) */
    public $post;
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post-box');
    }
}
