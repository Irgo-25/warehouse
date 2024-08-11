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

    public function rules(){
        return [
            'kategori' => ['required']
        ];
    }

    public function storeKategori(){
        $this->validate();
        Kategori::create([
            'kategori'=> $this->kategori
        ]);
        $this->reset('kategori');
    }
    public function storeKategoriToIndex(){
        return redirect()->route('kategoriBarang');

    }

    public function render()
    {
        return view('livewire.kategori.create-kategori');
    }
}
