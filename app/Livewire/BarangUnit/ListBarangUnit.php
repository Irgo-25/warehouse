<?php

namespace App\Livewire\BarangUnit;

use Livewire\Component;
use App\Models\BarangUnit;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('List Schema Unit')]
class ListBarangUnit extends Component
{
    public $kode_barang;

    // edit
    public $barangUnitId, $conversion_unit;
    protected $listeners = ['refreshBarangUnit' => 'listBarangUnit'];

    public function mount($kode_barang)
    {
        $this->kode_barang = $kode_barang;
    }

    public function edit($barangUnitID){
        $this->barangUnitId = $barangUnitID;
        $this->conversion_unit = BarangUnit::find($barangUnitID)->conversion_unit; 
    }

    public function update(){
        $this->validate([
            'conversion_unit' => 'required|numeric|min:1',
        ]);
        $BarangUnit = BarangUnit::find($this->barangUnitId);
        $BarangUnit->conversion_unit = $this->conversion_unit;
        $BarangUnit->update();
        $this->reset('barangUnitId');
    }
    public function cancelEdit(){
        $this->reset(['barangUnitId','conversion_unit']);
    }
    public function listBarangUnit(){
        $items = BarangUnit::where('barang_id', $this->kode_barang)->with('unit')->get();
        return $items;
    }

    public function delete($barangUnitID)
    {
        BarangUnit::destroy($barangUnitID);
    }

    public function render()
    {
        $items = $this->listBarangUnit($this->kode_barang);
        return view('livewire.barang-unit.list-barang-unit', compact('items'));
    }
}
