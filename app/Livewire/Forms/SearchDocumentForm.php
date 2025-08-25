<?php

namespace App\Livewire\Forms;

use Livewire\Component;

class SearchDocumentForm extends DocumentForm
{
    public function submit()
    {
        $this->validate();
    }
}
