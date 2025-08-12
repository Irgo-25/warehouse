<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $name;

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);
        $role = new Role();
        $role->name = $this->name;
        $role->save();
        $this->reset();
    }
    public function storeToIndex()
    {
        $this->validate([
            'name' => 'required'
        ]);
        $role = new Role();
        $role->name = $this->name;
        $role->save();
        $this->reset();
        return redirect()->route('role');
    }
    public function render()
    {
        return view('livewire.roles.create-role');
    }
}
