<?php

namespace App\Livewire\Documents;

use App\Models\Document;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class SearchDocument extends Component
{
    public $documents;

    #[On('documents-searched')]
    public function updateDocumentList($documents)
    {
        $this->documents = $documents;
    }

    public function destroy(Document $document)
    {
        try {
            $document->delete();
        } catch (Exception $e) {
            Toaster::error('não é possivel deletar este elemento pois ele se relaciona com alguma outra parte importante do sistema');
        }

        $this->dispatch('refresh-documents');
    }

    public function render()
    {
        return view('livewire.documents.search-document', [
            'documents' => $this->documents,
        ]);
    }
}
