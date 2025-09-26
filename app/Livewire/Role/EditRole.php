<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

#[Layout('components.layouts.app')]
#[Title('Edit Role')]
class EditRole extends Component
{
    // [1] Deklarasikan properti public untuk menampung model Role
    public Role $role;

    // Properti untuk form
    public $name;
    public $permissions = [];
    public $selectedPermissions = [];
    
    // [2] Gunakan mount() untuk menginisialisasi semua properti
    public function mount(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->permissions = Permission::all();
        $this->selectedPermissions = $role->permissions->pluck('name')->toArray();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|unique:roles,name,' . $this->role->id,
            'selectedPermissions' => 'nullable|array',
        ]);
        
        $this->role->update(['name' => $this->name]);
        $this->role->syncPermissions($this->selectedPermissions);

        session()->flash('success', 'Role berhasil diperbarui.');
        return redirect()->route('role');
    }

    public function render()
    {
        return view('livewire.role.edit-role');
    }
}
