<?php

namespace App\Livewire\BarangMasuk;

use App\Models\DataBarangMasuk;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
#[Title('Data Barang Masuk')]
class ListBarangMasuk extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $search;
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
        $items = DataBarangMasuk::with('barang', 'unit')
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.barang-masuk.list-barang-masuk', [
            'items' => $items
        ]);
    }
}
