<?php

namespace App\Livewire;

use Livewire\Component;

class DrawerWithDataAttributes extends Component
{
    public string $id;
    public string $position;
    public string $trigger;
    public string $title;
    public int $duration;

    public function __construct()
    {
        $this->id = \Illuminate\Support\Str::random();
        $this->position = 'left';
        $this->trigger = 'open drawer';
    }

    public function render()
    {
        return view('livewire.drawer-with-data-attributes');
    }
}
