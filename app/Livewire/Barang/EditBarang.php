<?php

namespace App\Livewire\Barang;

use App\Livewire\BarangUnit\ListBarangUnit;
use App\Models\BarangUnit;
use App\Models\Unit;
use Livewire\Component;
use App\Models\Kategori;
use App\Models\DataBarang;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Edit Barang')]
class EditBarang extends Component
{
    public $barang_id;
    public $kode_barang;
    public $nama_barang;
    public $kategori_id;
    public $unit_id;
    public $unit_barang;

    protected $rules = [
        'nama_barang'=>['required'],
        'kategori_id'=>['required', 'exists:kategori,id_kategori'],
        'unit_id'=>['required', 'exists:unit,id_unit'],
    ];

    public function mount($kode_barang){
        $Barang = DataBarang::findOrFail($kode_barang);
        $this->kode_barang = $Barang->kode_barang;
        $this->nama_barang = $Barang->nama_barang;
        $this->kategori_id = $Barang->kategori_id;
        $this->unit_id = $Barang->unit_id;
    }

    public function update(){
        $this->validate();

        $Barang = DataBarang::find($this->kode_barang);
        $Barang->nama_barang = $this->nama_barang;
        $Barang->kategori_id = $this->kategori_id;
        $Barang->unit_id = $this->unit_id;
        $Barang->save();
        return redirect()->route('listBarang');
    }

    public function render()
    {
        // $items = $this->listBarangUnit($this->kode_barang);
        $kategoris = Kategori::all();
        $units = Unit::all();
        return view('livewire.barang.edit-barang',compact('kategoris', 'units'));
    }
}
