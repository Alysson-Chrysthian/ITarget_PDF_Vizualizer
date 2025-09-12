<?php

namespace App\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;

class EditDocument extends Component
{
    public $document;

    public function mount($id)
    {
        $this->document = Document::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.documents.edit-document', [
            'document' => $this->document,
        ]);
    }
}
