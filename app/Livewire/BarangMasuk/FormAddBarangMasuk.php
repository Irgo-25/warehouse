<?php

namespace App\Livewire\BarangMasuk;

use Carbon\Carbon;
use App\Models\Unit;
use Livewire\Component;
use App\Models\BarangUnit;
use App\Models\DataBarang;
use App\Models\DataBarangMasuk;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Tambah Barang Masuk')]
class FormAddBarangMasuk extends Component
{
    public $show = false;
    public $items, $unit_id, $unitName, $units = [], $stock = null, $totalStock;
    public $id_barang_masuk, $tanggal_masuk, $selectedbarang = null, $jumlah_masuk = null, $keterangan;
    public $selectedunit;
    public $conversion_unit = 1;

    protected $rules = [
        'id_barang_masuk' => ['required'],
        'tanggal_masuk' => ['required', 'date'],
        'selectedbarang' => ['required'],
        'jumlah_masuk' => ['required', 'integer', 'min:1'],
        'keterangan' => ['required', 'max:220']
    ];
    public function updatedSelectedbarang()
    {
        $dataBarangs = DataBarang::where('kode_barang', $this->selectedbarang)->first();
        if ($dataBarangs) {
            $this->stock = $dataBarangs->stock;
            $this->unit_id = $dataBarangs->unit_id; // Ambil unit_id
        }
        $this->unitName = Unit::where('id_unit', $this->unit_id)->value('name');
        $this->units = BarangUnit::where('barang_id', $this->selectedbarang)->get();
        // Reset properti yang berhubungan
        $this->selectedunit = null;
        $this->jumlah_masuk = null;
        $this->totalStock = null;

        // Ambil data stock baru berdasarkan barang_id yang baru
    }
    public function mount()
    {
        $this->items = DataBarang::all();
        $this->generateCode();
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

    public function updatedJumlahmasuk($conversion)
    {
        $conversion = BarangUnit::where('barang_id', $this->selectedbarang)
            ->where('unit_id', $this->selectedunit)
            ->value("conversion_unit");
        if (!is_null($this->jumlah_masuk)) {
            $this->totalStock = $this->stock + ($this->jumlah_masuk * $conversion);
            }
    }

    public function submit()
    {
        // validasi Data
        $this->validate();

        // Simpan Data
        $BarangMasuk = new DataBarangMasuk();
        $BarangMasuk->id_barang_masuk = $this->id_barang_masuk;
        $BarangMasuk->barang_id = $this->selectedbarang;
        $BarangMasuk->tanggal_masuk = $this->tanggal_masuk;
        $BarangMasuk->jumlah_masuk = $this->jumlah_masuk;
        $BarangMasuk->unit_id = $this->selectedunit;
        $BarangMasuk->keterangan = $this->keterangan;
        $BarangMasuk->save();
        $stockMasuk = DataBarang::find($this->selectedbarang);
        $stockMasuk->stock = $this->totalStock;
        $stockMasuk->save();
        return redirect()->route('listBarangMasuk')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function render()
    {
        return view('livewire.barang-masuk.form-add-barang-masuk');
    }
}
