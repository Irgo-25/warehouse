<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Role;

#[Layout('components.layouts.app')]
#[Title('Edit User')]
class EditUser extends Component
{
    public $userID;
    public $name;
    public $email;
    public $password;
    public $role_id;

    public function mount($id)
    {
        $user = User::find($id);
        $this->userID = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
    }


    public function update()
    {
        if (!empty($this->password)) {
            $this->validate([
                'name' => 'required|min:3|string',
                'email' => 'required|email|unique:users,email,' . $this->userID,
                'password' => 'required|min:5',
                'role_id' => 'required'
            ]);
        } else {
            $this->validate([
                'name' => 'required|min:3|string',
                'email' => 'required|email|unique:users,email,' . $this->userID,
                'role_id' => 'required'
            ]);
        }
        $user = User::find($this->userID);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role_id = $this->role_id;

        if (!empty($this->password)) {
            $user->password = Hash::make($this->password);
        }
        $user->save();
        return redirect()->route('user');
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.user.edit-user', [
            'roles' => $roles
        ]);
    }
}
