<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Drawer extends Component
{
    // public string $id;
    // public string $position;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $position = 'left'
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.drawer');
    }
}
