<?php

namespace App\Livewire\Kategori;

use App\Models\Kategori;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Tambah Kategori')]
class CreateKategori extends Component
{
    public $kategori;

    public function storeKategori(){
        $this->validate([
            'kategori' => 'required'
        ]);
        $kategori = new Kategori();
        $kategori->kategori = $this->kategori;
        $kategori->save();
        $this->reset();
    }
    public function storeToIndex(){
        $this->validate([
            'kategori' => 'required'
        ]);
        $kategori = new Kategori();
        $kategori->kategori = $this->kategori;
        $kategori->save();
        return redirect()->route('kategoriBarang');

    }

    public function render()
    {
        return view('livewire.kategori.create-kategori');
    }
}
