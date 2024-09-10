<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class PublicLayout extends Component
{
  public $title;
  public $description;
  public $keywords;


  public function __construct($title = null, $description = null, $keywords = null)
  {
    $this->title = $title;
    $this->description = $description;
    $this->keywords = $keywords;
  }
  /**
   * Get the view / contents that represents the component.
   * 
   */
  public function render(): View
  {
    return view('layouts.public');
  }
}
