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
    public $items;
    public $units;
    public $barang_id;
    public $unit_id;
    public $conversion_unit;

    public function mount()
    {
        $this->items = DataBarang::all();
        $this->units = Unit::all();
    }
    // public function loadData()
    // {
    //     $this->barangUnits = BarangUnit::with('barang', 'unit')->get();
    // }
    public function store()
    {
        $this->validate([
            'barang_id' => 'required|exists:data_barang,kode_barang',
            'unit_id' => 'required|exists:units,id_unit',
            'conversion_unit' => 'required|numeric|min:1',
        ]);

        $barangUnit = new BarangUnit();
        $barangUnit->barang_id = $this->barang_id;
        $barangUnit->unit_id = $this->unit_id;
        $barangUnit->conversion_unit = $this->conversion_unit;
        $barangUnit->save();
        $this->reset('barang_id', 'unit_id', 'conversion_unit');

    }
    public function render()
    {

        return view('livewire.barang-unit.list-barang-unit');
    }
}
