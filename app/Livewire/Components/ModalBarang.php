<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Kategori;
use App\Models\DataBarang;
use App\Models\Unit;

class ModalBarang extends Component
{
    public $show = false;
    public $kode_barang;
    public $nama_barang;
    public $kategori_id;
    public $unit_id;

    protected $rules = [
        // 'kode_barang' => ['required', 'unique:data_barang,kode_barang'],
        // 'nama_barang' => ['required'],
        // 'kategori_id' => ['required'],
        // 'unit_id' => ['required'],
        'kode_barang' => 'required|unique:data_barang,kode_barang',
        'nama_barang' => 'required',
        'kategori_id' => 'required|exists:kategori,id_kategori',
        'unit_id' => 'required|exists:units,id_unit',
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
        $units = Unit::all();
        return view('livewire.components.modal-barang', compact('categoris', 'units'));
    }

    public function submit()
    {

        $this->validate();
        DataBarang::create([
            'kode_barang' => $this->kode_barang,
            'nama_barang' => $this->nama_barang,
            'kategori_id' => $this->kategori_id,
            'unit_id' => $this->unit_id,
        ]);
        return redirect()->route('listBarang')->with('success', 'Successfully added');
    }
}
