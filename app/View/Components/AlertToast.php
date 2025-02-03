<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AlertToast extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $message;
    public $position;
    public function __construct()
    {
        if (session('success')) {
            $this->type = 'success';
        }else{
            $this->type = 'error';
        }
        ;
        $this->message = session('success')?? session('error');
        $this->position = 'top-end';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert-toast');
    }
}
