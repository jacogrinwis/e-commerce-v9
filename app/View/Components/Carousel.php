<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;

class Carousel extends Component
{
    public $images;
    /**
     * Create a new component instance.
     */
    public function __construct($images)
    {
        // Als we een Collection krijgen met image objecten, transformeren we deze
        if ($images instanceof Collection) {
            $this->images = $images->pluck('url')
                ->map(fn($url) => asset($url))
                ->values()
                ->toArray();
        } else {
            $this->images = collect($images)
                ->map(fn($url) => asset($url))
                ->toArray();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.carousel');
    }
}
