<?php

namespace App\Livewire\BarangKeluar;

use App\Models\DataBarangKeluar;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Barang Keluar')]
class ListBarangKeluar extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search = null;
    public $sortBy = 'created_at';
    public $sortDir = 'desc';

    public function sorting($setColumn)
    {
        if ($this->sortBy == $setColumn) {
            $this->sortDir = ($this->sortDir == 'desc') ? 'asc' : 'desc';
            return;
        }
        $this->sortBy = $setColumn;
    }

    public function render()
    {
        $items = DataBarangKeluar::with('barang', 'unit')
        ->search($this->search)
        ->orderBy($this->sortBy, $this->sortDir)
        ->paginate($this->perPage);
        return view('livewire.barang-keluar.list-barang-keluar', [
            'items' => $items
        ]);
    }
}
