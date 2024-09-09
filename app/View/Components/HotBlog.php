<?php

namespace App\View\Components;

use App\Models\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HotBlog extends Component
{
    /**
     * Create a new component instance.
     */
    public $limit;
    public $pagi;
    public function __construct($limit = 3, $pagi = false)
    {
        $this->limit = $limit;
        $this->pagi = $pagi;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if ($this->pagi) {
            $blogs = Blog::with('user')->orderBy('updated_at', 'desc')->paginate($this->limit);
        } else {
            $blogs = Blog::with('user')->orderBy('updated_at', 'desc')->limit($this->limit)->get();
        }
        return view('components.hot-blog', compact('blogs'));
    }
}
