<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.app')]
class Logout extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->forget('remember_token');
        return redirect()->route('login');
    }
    public function render()
    {
        return '                  <a wire:click="logout" style="cursor: pointer"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                    role="menuitem">Sign out</a>';
    }
}
