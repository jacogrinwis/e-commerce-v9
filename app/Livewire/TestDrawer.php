<?php

namespace App\Livewire;

use Livewire\Component;

class TestDrawer extends Component
{
    public $id;
    public $color;
    public $position;

    public function render()
    {
        return view('livewire.test-drawer');
    }
}
