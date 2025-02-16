<?php

namespace App\Livewire\BarangUnit;

use App\Models\Unit;
use Livewire\Component;
use App\Models\BarangUnit;
use App\Models\DataBarang;

class AddBarangUnit extends Component
{
    public $kode_barang, $conversion_unit, $unit_barang;

    public function mount($kode_barang)
    {
        DataBarang::findOrFail($kode_barang);
    }
    public function storeBarangUnit()
    {
        $this->validate([
            'kode_barang' => 'required|exists:data_barang,kode_barang',
            'unit_barang' => 'required|exists:unit,id_unit',
            'conversion_unit' => 'required|numeric|min:1',
        ]);

        $barangUnit = new BarangUnit();
        $barangUnit->barang_id = $this->kode_barang;
        $barangUnit->unit_id = $this->unit_barang;
        $barangUnit->conversion_unit = $this->conversion_unit;
        $barangUnit->save();
        $this->reset('conversion_unit');
    }
    public function render()
    {
        $units = Unit::all();
        return view('livewire.barang-unit.add-barang-unit', compact('units'));
    }
}
