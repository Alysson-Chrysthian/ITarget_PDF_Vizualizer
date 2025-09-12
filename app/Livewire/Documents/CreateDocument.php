<?php

namespace App\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithFileUploads;
use Smalot\PdfParser\Parser;

class CreateDocument extends Component
{
    use WithFileUploads;

    public $file, $document = null;

    public function updatedFile()
    {
        if (!$this->file)
            return null;

        $path = $this->file->getPathname();

        $parser = new Parser();
        $pdf = $parser->parseFile($path);

        $document_text = $pdf->getText();

        $this->dispatch('pdf-read', document_text: $document_text);
    }

    public function render()
    {
        return view('livewire.documents.create-document');
    }
}