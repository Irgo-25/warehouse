<?php

namespace App\Livewire\BarangMasuk;

use Livewire\Component;
use App\Models\DataBarang;
use App\Models\DataBarangMasuk;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Data Barang Masuk')]
class EditBarangMasuk extends Component
{
    public $items;
    public $id_barang_masuk, $tanggal_masuk, $barang_id, $jumlah_masuk, $keterangan;
    public function mount($id_barang_masuk)
    {
        $this->items = DataBarang::all();
        $barangMasuk = DataBarangMasuk::find($id_barang_masuk);
        $this->id_barang_masuk = $barangMasuk->id_barang_masuk;
        $this->tanggal_masuk = $barangMasuk->tanggal_masuk;
        $this->barang_id = $barangMasuk->barang_id;
        $this->jumlah_masuk = $barangMasuk->jumlah_masuk;
        $this->keterangan = $barangMasuk->keterangan;
    }

    public function update(){
        $barangMasuk = DataBarangMasuk::find($this->id_barang_masuk);
        $barangMasuk->tanggal_masuk = $this->tanggal_masuk;
        $barangMasuk->keterangan = $this->keterangan;
        $barangMasuk->save();
        return redirect()->route('listBarangMasuk');

    }
    public function render()
    {
        return view('livewire.barang-masuk.edit-barang-masuk');
    }
}
