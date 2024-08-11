<?php

namespace App\Livewire\Barang;

use App\Models\DataBarang;
use App\Models\Kategori;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Edit Barang')]
class EditBarang extends Component
{
    public $kode_barang;
    public $nama_barang;
    public $category_id;
    public $satuan;

    protected $rules = [
        'nama_barang'=>['required'],
        'category_id'=>['required'],
        'satuan'=>['required'],
    ];

    public function mount($kode_barang){
        $Barang = DataBarang::find($kode_barang);
        $this->kode_barang = $Barang->kode_barang;
        $this->nama_barang = $Barang->nama_barang;
        $this->category_id = $Barang->category_id;
        $this->satuan = $Barang->satuan;
    }

    public function update(){
        $this->validate();

        $Barang = DataBarang::find($this->kode_barang);
        $Barang->nama_barang = $this->nama_barang;
        $Barang->category_id = $this->category_id;
        $Barang->satuan = $this->satuan;
        $Barang->save();
        return redirect()->route('listBarang');
    }

    public function render()
    {
        $categoris = Kategori::all();
        return view('livewire.barang.edit-barang', [
            'categoris' => $categoris
        ]);
    }
}
