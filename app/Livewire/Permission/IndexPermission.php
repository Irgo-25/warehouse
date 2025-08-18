<?php

namespace App\Livewire\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Permission;

#[Layout('components.layouts.app')]
#[Title('Permission')]
class IndexPermission extends Component
{
    use WithPagination;
    public $sortBy = 'name';
    public $sortDir = 'desc';
    public $perPage = 5;
    public $search;

    public function sorting($setColumn)
    {
        if ($this->sortBy == $setColumn) {
            $this->sortDir = ($this->sortDir == 'desc') ? 'asc' : 'desc';
            return;
        }
        $this->sortBy = $setColumn;
    }
    public function render()
    {
        $permissions = Permission::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.permission.index-permission', [
            'permissions' => $permissions
        ]);
    }
}
