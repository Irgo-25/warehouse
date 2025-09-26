<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Permission;

#[Layout('components.layouts.app')]
#[Title('Create Permission')]
class CreatePermission extends Component
{
        public $name;

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);
        $role = new Permission();
        $role->name = $this->name;
        $role->save();
        $this->reset();
    }
    public function storeToIndex()
    {
        $this->validate([
            'name' => 'required'
        ]);
        $role = new Permission();
        $role->name = $this->name;
        $role->save();
        $this->reset();
        return redirect()->route('role');
    }
    public function render()
    {
        return view('livewire.permission.create-permission');
    }
}
