<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
class IndexUser extends Component
{
    use WithPagination;

    #[Title('User')]
    public $sortBy = 'created_at';
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
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->delete();
            $this->dispatch('swal:deleted');
        }
    }
    public function render()
    {
        $users = User::with('roles')->search($this->search)
        ->orderBy($this->sortBy, $this->sortDir)
        ->paginate($this->perPage);
        return view('livewire.user.index-user', [
            'users' => $users,
        ]);
    }
}
