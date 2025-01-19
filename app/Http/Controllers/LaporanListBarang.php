<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanListBarang extends Controller
{
    public function PdfListBarang()
    {
        $items = DataBarang::all();
        $pdf = Pdf::loadView('Export.laporanListBarang', ['items'=>$items]);
        return $pdf->stream();
    }
}
