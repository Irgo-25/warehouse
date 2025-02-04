<?php

namespace App\Livewire\BarangKeluar;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DataBarangKeluar;

class LaporanBarangKeluar extends Component
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
        $items = DataBarangKeluar::with(['barang', 'unit'])->whereBetween('tanggal_keluar', [$this->tanggalAwal,  $this->tanggalAkhir])->get();

        $pdf = Pdf::loadView('Export.LaporanBarangKeluar', ['items'=>$items]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Laporan Barang Keluar.pdf');

    }
    public function render()
    {
        return view('livewire.barang-keluar.laporan-barang-keluar');
    }
}
