<?php

namespace App\Livewire\Creditors;

use App\Models\Creditor;
use Livewire\Component;

class EditCreditor extends Component
{
    public $creditor;

    public function mount($id)
    {
        $this->creditor = Creditor::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.creditors.edit-creditor', [
            'creditor' => $this->creditor,
        ]);
    }
}
