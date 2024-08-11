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
    public $kategori;

    public function mount($id_category)
    {
        $kategoris = Kategori::find($id_category);
        $this->kategoriID = $kategoris->id_category;
        $this->kategori = $kategoris->kategori;
    }

    public function updateKategori(){
        $this->validate([
            'kategori' => ['required', 'string']
        ]);
        $kategoris = Kategori::find($this->kategoriID);
        $kategoris->kategori = $this->kategori;
        $kategoris->save();

    }
    public function render()
    {
        return view('livewire.kategori.edit-kategori');
    }
}
