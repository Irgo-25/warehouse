<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.app2')]
#[Title('Login')]
class Login extends Component
{
    public $email, $password, $rememberMe = false;

    public function HandleLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
            
        ];
        if (Auth::attempt($credentials,$this->rememberMe)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Alamat Email atau Password Anda salah!');
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
