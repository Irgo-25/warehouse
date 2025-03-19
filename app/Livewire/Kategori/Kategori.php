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

    public $kategoriID, $kategori;
    protected $listeners = ["deleteConfirmed" => "delete"];
    public function edit($kategoriID){
        $this->kategoriID = $kategoriID;
        $this->kategori = ModelsKategori::find($kategoriID)->kategori;
    }

    public function update(){
        $this->validate([
            "kategori" => "required"
        ]);
        $editKategori = ModelsKategori::findOrFail($this->kategoriID);
        $editKategori->kategori = $this->kategori;
        $editKategori->update();
        $this->reset("kategoriID");

    }

    public function cancelEdit(){
        $this->reset([
            "kategoriID",
            "kategori"
        ]);
    }
    public function delete($id_kategori){
        $kategori = ModelsKategori::where('id_kategori', $id_kategori)->first();
        if ($kategori) {
            $kategori->delete();
            $this->dispatch('swal:deleted');
        }
    }

    public function render()
    {
        $kategoris = ModelsKategori::paginate(5);
        return view('livewire.kategori.kategori', compact('kategoris'));
    }
}
