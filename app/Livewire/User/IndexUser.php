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
    public $perPage = 5;
    public $search;

    public function render()
    {
        $users = User::with('role')->search($this->search)->paginate($this->perPage);
        return view('livewire.user.index-user', [
            'users' => $users,
        ]);
    }

    public function delete($id)
    {
        User::destroy($id);
    }
}
