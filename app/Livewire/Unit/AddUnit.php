<?php

namespace App\Livewire\Unit;

use App\Models\Unit;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Add Unit')]
class AddUnit extends Component
{

    public $name;

    public function storeUnit(){
        $this->validate([
            'name' => 'required'
        ]);

        $unit = new Unit();
        $unit->name = $this->name;
        $unit->save();
        $this->reset('name');

    }
    public function storeToIndex(){
        $this->validate([
            'name' => 'required'
        ]);

        $unit = new Unit();
        $unit->name = $this->name;
        $unit->save();
        return redirect()->route('indexUnit');
    }

    public function render()
    {
        return view('livewire.unit.add-unit');
    }
}
