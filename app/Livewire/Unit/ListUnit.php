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
    public function delete($id_unit){
        Unit::destroy($id_unit);

    }
    public function render()
    {
        $units = Unit::paginate(5);
        return view('livewire.unit.list-unit', compact('units'));
    }
}
