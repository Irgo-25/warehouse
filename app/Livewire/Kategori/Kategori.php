<?php

namespace App\Livewire\Kategori;

use App\Models\Kategori as ModelsKategori;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
#[Title('Kategori Barang')]
class Kategori extends Component
{
    use WithPagination;

    public function delete($id_kategori){
        ModelsKategori::destroy($id_kategori);
    }

    public function render()
    {
        $kategoris = ModelsKategori::paginate(5);
        return view('livewire.kategori.kategori', compact('kategoris'));
    }
}
