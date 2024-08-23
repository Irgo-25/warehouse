<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ModalBarangKeluar extends Component
{
    public $show = false;
    public function toogle()
    {
        $this->show = !$this->show;
    }

    public function render()
    {
        return view('livewire.components.modal-barang-keluar');
    }
}
