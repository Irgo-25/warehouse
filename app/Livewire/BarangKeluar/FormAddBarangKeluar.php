<?php

namespace App\Livewire\BarangKeluar;

use Carbon\Carbon;
use App\Models\Unit;
use Livewire\Component;
use App\Models\BarangUnit;
use App\Models\DataBarang;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\DataBarangKeluar;
use Illuminate\Validation\ValidationException;

#[Layout('components.layouts.app')]
#[Title('Barang Keluar')]
class FormAddBarangKeluar extends Component
{
    public $show = false;
    public $items, $unit_id, $unitName, $units = [], $stock = null, $totalStock;
    public $id_barang_keluar, $tanggal_keluar, $selectedbarang = null, $jumlah_keluar = null, $keterangan;
    public $selectedunit;
    public $conversion_unit = 1;

    protected $rules = [
        'id_barang_keluar' => ['required'],
        'tanggal_keluar' => ['required', 'date'],
        'selectedbarang' => ['required'],
        'jumlah_keluar' => ['required', 'integer', 'min:1'],
        'keterangan' => ['required', 'max:220']
    ];
    protected $messages = [
        'selectedunit.required' => 'Unit harus dipilih!',
        'tanggal_keluar.required' => 'Tanggal keluar tidak boleh kosong!',
        'jumlah_keluar.required' => 'Jumlah keluar tidak boleh kosong!',
    ];
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
        $this->jumlah_keluar = null;
        $this->totalStock = null;

        // Ambil data stock baru berdasarkan barang_id yang baru
    }

    public function updatedJumlahkeluar($conversion)
    {
        $conversion = BarangUnit::where('barang_id', $this->selectedbarang)
            ->where('id', $this->selectedunit)
            ->value("conversion_unit");
        if (!is_null($this->jumlah_keluar)) {
            $this->totalStock = $this->stock - ($this->jumlah_keluar * $conversion);
        }
    }

    public function submit()
    {
        try{
            // validasi Data
            $this->validate();
            $stockKeluar = DataBarang::find($this->selectedbarang);
            if ($this->totalStock < 0) {
                return redirect()->route('addBarangKeluar')->with('error', 'Jumlah yang dimasukkan melebihi stok tersedia');
            }
            // Simpan Data
            $BarangKeluar = new DataBarangKeluar();
            $BarangKeluar->id_barang_keluar = $this->id_barang_keluar;
            $BarangKeluar->barang_id = $this->selectedbarang;
            $BarangKeluar->tanggal_keluar = $this->tanggal_keluar;
            $BarangKeluar->jumlah_keluar = $this->jumlah_keluar;
            $BarangKeluar->unit_id = $this->selectedunit;
            $BarangKeluar->keterangan = $this->keterangan;
            $BarangKeluar->save();
            $stockKeluar->stock = $this->totalStock;
            $stockKeluar->save();
            return redirect()->route('listBarangKeluar')->with('success', 'Data Berhasil Ditambahkan');
        }catch(ValidationException $e){
            $this->reset(['selectedunit', 'jumlah_keluar']);
            foreach ($e->validator->errors()->messages() as $key => $messages) {
                foreach ($messages as $message) {
                    $this->addError($key,$message);
                }
            }
        };
    }

    public function render()
    {
        $this->generateCode();
        return view('livewire.barang-keluar.form-add-barang-keluar');
    }
}
