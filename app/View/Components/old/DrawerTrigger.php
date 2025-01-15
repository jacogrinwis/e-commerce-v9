<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DrawerTrigger extends Component
{
    public $show;
    public $target;
    /**
     * Create a new component instance.
     */
    public function __construct($show, $target)
    {
        $this->show = $show;
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.drawer-trigger');
    }
}
