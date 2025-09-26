<?php

namespace App\Livewire;

use App\Models\DataBarang;
use App\Models\DataBarangKeluar;
use App\Models\DataBarangMasuk;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Beranda')]
class Dasboard extends Component
{
    public $dataBarang, $barangMasuk, $barangKeluar;
    public function countDataBarang(){
        $this->dataBarang = DataBarang::count();
    }

    public function countBarangMasuk(){
        $this->barangMasuk = DataBarangMasuk::count();
    }
    public function countBarangKeluar(){
        $this->barangKeluar = DataBarangKeluar::count();
    }

    public function mount(){
        $this->countDataBarang();
        $this->countBarangMasuk();
        $this->countBarangKeluar();
    }
    public function render()
    {
        return view('livewire.dasboard');
    }
}
