<?php

namespace App\Livewire\Roles;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
#[Title('Roles')]
class IndexRole extends Component
{
    use WithPagination;
    public $sortBy = 'name';
    public $sortDir = 'desc';
    public $perPage = 5;
    public $search;
    protected $listeners = ['deleteConfirmed' => 'delete'];
    public function sorting($setColumn)
    {
        if ($this->sortBy == $setColumn) {
            $this->sortDir = ($this->sortDir == 'desc') ? 'asc' : 'desc';
            return;
        }
        $this->sortBy = $setColumn;
    }
    public function delete($id)
    {
        $role = Role::where('id', $id)->first();
        if ($role) {
            $role->delete();
            $this->dispatch('swal:deleted');
        }
    }
    public function render()
    {
        $roles = Role::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.roles.index-role', [
            'roles' => $roles,
        ]);
    }
}
