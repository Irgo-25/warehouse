<?php

namespace App\View\Components;
use Illuminate\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{

    public function logout()
    {
        Auth::logout();
        session()->forget('remember_token');
        return redirect()->route('login');
    }

    public function render(): View
    {
        return view('components.navbar');
    }
}
