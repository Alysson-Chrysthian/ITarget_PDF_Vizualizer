<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class CreateDocumentForm extends DocumentForm
{
    protected function rules() 
    {
        return array_map(function ($value) {
            return 'required|' . $value;
        }, $this->rules);
    }

    public function submit()
    {
        $this->validate();
    }
}
