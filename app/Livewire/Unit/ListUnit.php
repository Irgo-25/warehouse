<?php

namespace App\Livewire\Unit;

use App\Models\Unit;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('List Unit')]
class ListUnit extends Component
{
    use WithPagination;

    public $unitID, $name;

    public function edit($unitID){
        $this->unitID = $unitID;
        $this->name = Unit::find($unitID)->name;
    }
    public function update(){
        $this->validate([
            "name"=> "required"
        ]);
        $editUnit = Unit::findOrFail($this->unitID);
        $editUnit->name = $this->name;
        $editUnit->update();
        $this->reset("unitID");
    }

    public function cancelEdit(){
        $this->reset(["unitID","name"]);
    }
    public function delete($id_unit){
        Unit::destroy($id_unit);

    }
    public function render()
    {
        $units = Unit::paginate(5);
        return view('livewire.unit.list-unit', compact('units'));
    }
}
