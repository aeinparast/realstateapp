<?php

namespace App\View\Components;

use App\Models\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class blogItemsDash extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Assign paginated blog posts to the class property
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $blogs = Blog::all();

        // Pass the component's posts property to the view
        return view('components.blog-items-dash', compact('blogs'));
    }
}
