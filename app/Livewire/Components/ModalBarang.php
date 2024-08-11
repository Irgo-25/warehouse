<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Kategori;
use App\Models\DataBarang;

class ModalBarang extends Component
{
    public $show = false;
    public $kode_barang;
    public $nama_barang;
    public $category_id;
    public $stock;
    public $satuan;

    protected $rules = [
        'nama_barang' => ['required'],
        'category_id' => ['required'],
        'satuan' => ['required'],
    ];
    // form modal barang
    public function toogle()
    {
        $this->show = !$this->show;
    }

    public function generateCode()
    {
        // Hitung banyak data di DB
        $anyItem = DataBarang::count();
        // logika generate code 
        if ($anyItem == 0) {
            $setCode = 1;
        } else {
            $putcode = DataBarang::latest()->first();
            $setCode = (int)substr($putcode->kode_barang, 5) + 1;
        }
        $getCode = str_pad($setCode, 6, "0", STR_PAD_LEFT);
        $this->kode_barang = "ITR-$getCode";
    }
    public function render()
    {
        $this->generateCode();
        $categoris = Kategori::all();
        return view('livewire.components.modal-barang', [
            'categoris' => $categoris,
        ]);
    }

    public function submit()
    {

        $this->validate();
        DataBarang::create([
            'kode_barang' => $this->kode_barang,
            'nama_barang' => $this->nama_barang,
            'category_id' => $this->category_id,
            'satuan' => $this->satuan,
        ]);
        return redirect()->route('listBarang');
    }
}
