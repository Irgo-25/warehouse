<?php

namespace App\Livewire\BarangKeluar;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Barang Keluar')]
class ListBarangKeluar extends Component
{
    use WithPagination;
    public $perPage = 5;

    public $sortBy = 'created_at';
    public $sortDir = 'desc';
    
    public function render()
    {
        return view('livewire.barang-keluar.list-barang-keluar');
    }
}
