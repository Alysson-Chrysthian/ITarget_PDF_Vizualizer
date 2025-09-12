<?php

namespace App\Livewire\Instituitions;

use App\Models\Instituition;
use Livewire\Component;

class EditInstituition extends Component
{
    public $instituition;

    public function mount($id)
    {
        $this->instituition = Instituition::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.instituitions.edit-instituition', [
            'instituition' => $this->instituition,
        ]);
    }
}
