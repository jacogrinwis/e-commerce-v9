<?php

namespace App\Livewire;

use Livewire\Component;

class Drawer extends Component
{
    public string $id = 'drawer';
    public string $position = 'left';
    public string $trigger;

    public function render()
    {
        return view('livewire.drawer');
    }
}
