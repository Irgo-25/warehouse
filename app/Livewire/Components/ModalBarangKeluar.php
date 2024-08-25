<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\DataBarang;
use App\Models\DataBarangKeluar;
use Carbon\Carbon;

class ModalBarangKeluar extends Component
{
    public $show = false;
    // property untuk memanggil item data barang
    public $items;
    // property untuk declare field data barang keluar
    public $id_barang_keluar, $tanggal_keluar, $barang_id, $jumlah_keluar = null, $keterangan;
    public function toogle()
    {
        $this->show = !$this->show;
    }

    public function mount()
    {
        $this->items = DataBarang::all();
    }
    public function generateCode()
    {
        // menghitung jumlah data rows di DB
        $getItem = DataBarangKeluar::count();
        // set waktu sekarang
        $date = Carbon::now();
        $tanggal = $date->format('d');
        $bulan = $date->format('m');
        $tahun = $date->format('Y');
        // Logika untuk generate code
        if ($getItem == 0) {
            $setCode = 1;
        } else {
            // mengambil data terakhir di DB
            $putcode = DataBarangKeluar::latest()->first();
            $setCode = (int)substr($putcode->id_barang_keluar, -4) + 1;
        }
        $getCode = str_pad($setCode, 4, "0", STR_PAD_LEFT);
        $this->id_barang_keluar = "IK-$tanggal$bulan$tahun-$getCode";
    }
    public function render()
    {
        $this->generateCode();
        return view('livewire.components.modal-barang-keluar');
    }
}
