<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
  public $url;
  public $title;
  public $icon;

  public function __construct($url, $title, $icon = null)
  {
    $this->url = $url;
    $this->title = $title;
    $this->icon = $icon;
  }

  public function render(): View|Closure|string
  {
    return view('components.menu');
  }
}
