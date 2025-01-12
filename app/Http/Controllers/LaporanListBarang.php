<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanListBarang extends Controller
{
    public function PdfListBarang()
    {
        $items = DataBarang::all();
        // return $items;
        // dd($items);
        $pdf = Pdf::loadView('Export.laporanListBarang', ['items'=>$items]);
        return $pdf->stream();
    }
}
