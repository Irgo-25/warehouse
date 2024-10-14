<?php

namespace App\Livewire\Components;

use App\Models\BarangUnit;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\DataBarang;
use App\Models\DataBarangMasuk;
use App\Models\Unit;

class ModalBarangMasuk extends Component
{
    public $show = true;
    public $items, $unit_id, $unitName, $units = [], $stock = null, $totalStock;
    public $id_barang_masuk, $tanggal_masuk, $barang_id = null, $jumlah_masuk = null, $keterangan;
    public $selectedUnit = null;
    public $conversion_unit = 1;

    protected $rules = [
        'id_barang_masuk' => ['required'],
        'tanggal_masuk' => ['required', 'date'],
        'barang_id' => ['required'],
        'jumlah_masuk' => ['required', 'integer'],
        'keterangan' => ['required', 'max:220']
    ];
    public function toogle()
    {
        $this->show = !$this->show;
    }
    public function generateCode()
    {
        // menghitung jumlah data rows di DB
        $anyItem = DataBarangMasuk::count();
        // set waktu sekarang
        $date = Carbon::now();
        $tanggal = $date->format('d');
        $bulan = $date->format('m');
        $tahun = $date->format('Y');
        // logika generate code 
        if ($anyItem == 0) {
            $setCode = 1;
        } else {
            $putcode = DataBarangMasuk::latest()->first();
            $setCode = (int)substr($putcode->id_barang_masuk, -4) + 1;
        }
        $getCode = str_pad($setCode, 4, "0", STR_PAD_LEFT);
        $this->id_barang_masuk = "IM-$tanggal$bulan$tahun-$getCode";
    }

    public function mount()
    {
        $this->items = DataBarang::all();
        $this->generateCode();
    }

    public function updateItem()
    {
        // $this->stock = DataBarang::where('kode_barang', $this->barang_id)->value('stock');
        // $this->units = DataBarang::where('kode_barang', $this->barang_id)->value('unit_id');
        $dataBarangs = DataBarang::where('kode_barang', $this->barang_id)->first();
        if ($dataBarangs) {
            $this->stock = $dataBarangs->stock;
            $this->unit_id = $dataBarangs->unit_id; // Ambil unit_id
        }
        $this->unitName = Unit::where('id_unit', $this->unit_id)->value('name');
        $this->units = BarangUnit::where('barang_id', $this->barang_id)->get();
    }

    public function calculateStock()
    {
        if ($this->jumlah_masuk !== null) {
            $conversion = BarangUnit::where('barang_id', $this->barang_id)
                            ->where('unit_id',$this->selectedUnit)
                            ->value('conversion_unit');

            $this->totalStock = $this->stock + ($this->jumlah_masuk * $conversion);
        } else {
            $this->totalStock = null;
        }
    }

    public function submit()
    {
        // validasi Data
        $this->validate();

        // Simpan Data
        $BarangMasuk = new DataBarangMasuk();
        $BarangMasuk->id_barang_masuk = $this->id_barang_masuk;
        $BarangMasuk->tanggal_masuk = $this->tanggal_masuk;
        $BarangMasuk->barang_id = $this->barang_id;
        $BarangMasuk->jumlah_masuk = $this->jumlah_masuk;
        $BarangMasuk->keterangan = $this->keterangan;
        $BarangMasuk->save();
        $stockMasuk = DataBarang::find($this->barang_id);
        $stockMasuk->stock += $this->totalStock;
        $stockMasuk->save();
        return redirect()->route('listBarangMasuk');
    }
    public function render()
    {
        return view('livewire.components.modal-barang-masuk');
    }
}
