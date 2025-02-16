<?php

namespace App\Livewire\BarangUnit;

use App\Models\Unit;
use Livewire\Component;
use App\Models\BarangUnit;
use App\Models\DataBarang;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('List Schema Unit')]
class ListBarangUnit extends Component
{
    public $kode_barang;

    public function mount($kode_barang){
        $Barang = DataBarang::findOrFail($kode_barang);
        $this->kode_barang = $Barang->kode_barang;
    }
    public function listBarangUnit(){
        $items = BarangUnit::where('barang_id', $this->kode_barang)->with('unit')->get();
        return $items;
    }

    public function render()
    {
        $items = $this->listBarangUnit($this->kode_barang);
        return view('livewire.barang-unit.list-barang-unit', compact('items'));
    }
}
