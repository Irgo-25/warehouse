<?php

namespace App\Livewire\Barang;

use Livewire\Component;
use App\Models\DataBarang;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('List Barang')]

class ListBarang extends Component
{
    use WithPagination;
    public $search;
    public $sortBy = 'created_at';
    public $sortDir = 'desc';
    public $perPage = 5;


    public function delete($kode_barang)
    {
        $barang = DataBarang::find($kode_barang);
        $barang->delete();
    }
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

        $items = DataBarang::with('category')->search($this->search)
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        $this->resetPage();
        return view('livewire.barang.list-barang', [
            'items' => $items
        ]);
    }
}
