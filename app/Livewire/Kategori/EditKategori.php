<?php

namespace App\Livewire\Kategori;

use App\Models\Kategori;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Edit Kategori')]
class EditKategori extends Component
{
    public $kategoriID;
    public $id_kategori;
    public $kategori;

    public function mount($id_kategori)
    {
        $kategoris = Kategori::find($id_kategori);
        $this->kategoriID = $kategoris->id_kategori;
        $this->kategori = $kategoris->kategori;
    }

    public function updateKategori(){
        $this->validate([
            'kategori' => ['required', 'string']
        ]);
        $kategoris = Kategori::find($this->kategoriID);
        $kategoris->kategori = $this->kategori;
        $kategoris->save();
        return redirect()->route('kategoriBarang');

    }
    public function render()
    {
        return view('livewire.kategori.edit-kategori');
    }
}
