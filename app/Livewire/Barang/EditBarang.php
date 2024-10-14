<?php

namespace App\Livewire\Barang;

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
    public $kode_barang;
    public $nama_barang;
    public $kategori_id;
    public $unit_id;

    protected $rules = [
        'nama_barang'=>['required'],
        'kategori_id'=>['required', 'exists:kategori,id_kategori'],
        'unit_id'=>['required', 'exists:units,id_unit'],
    ];

    public function mount($kode_barang){
        $Barang = DataBarang::find($kode_barang);
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
        $kategoris = Kategori::all();
        $units = Unit::all();
        return view('livewire.barang.edit-barang',compact('kategoris', 'units'));
    }
}
