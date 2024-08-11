<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

#[Layout('components.layouts.app')]
#[Title('Tambah User')]
class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $role_id;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:5',
        'role_id' => 'required',
    ];
    public function storeUserToIndex()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => $this->role_id,
        ]);
        return redirect()->route('user');
    }
    public function storeUser()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => $this->role_id,
        ]);
        $this->reset();
    }


    public function render()
    {
        $roles = Role::all();
        return view('livewire.user.create-user', [
            'roles' => $roles
        ]);
    }
}
