<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\DataBarang;
use App\Models\DataBarangMasuk;
use Carbon\Carbon;

class ModalBarangMasuk extends Component
{
    public $show = false;
    public $items, $stock = null, $totalStock;
    public  $id_barang_masuk, $tanggal_masuk, $barang_id, $jumlah_masuk = null, $keterangan;

    protected $rules = [
        'id_barang_masuk' => ['required'],
        'tanggal_masuk' => ['required', 'date'],
        'barang_id' => ['required'],
        'jumlah_masuk' => ['required', 'integer'],
        'keterangan' => ['required', 'max:220']
    ];
public function toogle(){
    $this->show = !$this->show;
}
    public function generateCode()
    {
        // Hitung banyak data di DB
        $anyItem = DataBarangMasuk::count();
        $date = Carbon::now();
        $tanggal = $date->format('d');
        $bulan = $date->format('m');
        $tahun = $date->format('Y');
        // logika generate code 
        if ($anyItem == 0) {
            $setCode = 1;
        } else {
            $putcode = DataBarangMasuk::latest()->first();
            $setCode = (int)substr($putcode->id_barang_masuk, 5) + 1;
        }
        $getCode = str_pad($setCode, 3, "0", STR_PAD_LEFT);
        $this->id_barang_masuk = "IM-$getCode/$tanggal/$bulan/$tahun";
    }

    public function mount()
    {
        $this->items = DataBarang::all();
    }

    public function getStock()
    {
        $this->stock = DataBarang::all()
            ->where('kode_barang', $this->barang_id)
            ->value('stock');
    }

    public function calculateStock()
    {
        if(!$this->jumlah_masuk == null){

            $this->totalStock = $this->stock + $this->jumlah_masuk;
        }else{
            $this->totalStock = null;
        }
    }

    public function submit(){
        $this->validate();
        $BarangMasuk = new DataBarangMasuk();
        $BarangMasuk->id_barang_masuk = $this->id_barang_masuk;
        $BarangMasuk->tanggal_masuk = $this->tanggal_masuk;
        $BarangMasuk->barang_id = $this->barang_id;
        $BarangMasuk->jumlah_masuk = $this->jumlah_masuk;
        $BarangMasuk->keterangan = $this->keterangan;
        $BarangMasuk->save();
        $stockMasuk = DataBarang::find($this->barang_id);
        $stockMasuk->stock = $this->totalStock;
        $stockMasuk->save();
        return redirect()->route('listBarangMasuk');
    }
    public function render()
    {
        $this->generateCode();
        return view('livewire.components.modal-barang-masuk');
    }
}
