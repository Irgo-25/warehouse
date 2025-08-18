<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Permission')]
class IndexPermission extends Component
{
    public function render()
    {
        return view('livewire.permission.index-permission');
    }
}
