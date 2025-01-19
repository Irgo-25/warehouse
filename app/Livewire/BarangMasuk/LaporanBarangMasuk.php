<?php

namespace App\Livewire\BarangMasuk;

use App\Models\DataBarangMasuk;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanBarangMasuk extends Component
{
    public $show = false, $tanggalAwal, $tanggalAkhir;

    public function openModal()
    {
        $this->show = !$this->show;
    }
    public function closeModal()
    {
        $this->show = false;
    }
    public function export()
    {
        $this->validate([
            'tanggalAwal' => 'required',
            'tanggalAkhir' => 'required',
        ]);
        $items = DataBarangMasuk::with(['barang', 'unit'])->whereBetween('tanggal_masuk', [$this->tanggalAwal,  $this->tanggalAkhir])->get();

        $pdf = Pdf::loadView('Export.LaporanBarangMasuk', ['items'=>$items]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Laporan Barang Masuk.pdf');

    }
    public function render()
    {
        return view('livewire.barang-masuk.laporan-barang-masuk');
    }
}
