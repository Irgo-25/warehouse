<?php

namespace App\Livewire\Unit;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Edit Unit')]
class EditUnit extends Component
{
    public function render()
    {
        return view('livewire.unit.edit-unit');
    }
}
