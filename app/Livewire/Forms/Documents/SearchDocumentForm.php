<?php

namespace App\Livewire\Forms\Documents;

use App\Livewire\Forms\Base\DocumentForm;
use App\Models\Document;
use Livewire\Attributes\On;
use Livewire\Component;

class SearchDocumentForm extends DocumentForm
{
    public function mount()
    {
        $this->submit();
    }

    protected function rules()
    {
        return array_map(function ($value) {
            return $value . '|nullable';
        }, $this->rules);
    }

    public function submit()
    {
        $this->validate();

        $documents = Document::query()
            ->with(['instituition', 'creditor'])
            ->where('document_id', 'like', '%' . $this->documentID . '%')
            ->orWhere('process_id', 'like', '%' . $this->processID . '%')
            ->orWhere('commit_id', 'like', '%' . $this->commitID . '%')
            ->orWhere('document_box', 'like', '%' . $this->documentBox . '%')
            ->orWhere('document_date', 'like', '%' . $this->documentDate . '%')
            ->orWhere('digitalization_date', 'like', '%' . $this->digitalizationDate . '%')
            ->orWhere('payment_date', 'like', '%' . $this->paymentDate . '%')
            ->orWhere('financial_year', 'like', '%' . $this->financialYear . '%')
            ->orWhere('reference_month', 'like', '%' . $this->referenceMonth . '%')
            ->orWhere('payment_billing', 'like', '%' . $this->paymentBilling . '%')
            ->orWhere('operation_type', 'like', '%' . $this->operationType . '%')
            ->orWhere('description', 'like', '%' . $this->description . '%')
            ->orWhere('instituition_id', 'like', '%' . $this->instituitionID . '%')
            ->orWhere('creditor_id', 'like', '%' . $this->creditorID . '%')
            ->get();

        $this->dispatch('documents-searched', documents: $documents);
    }

    #[On('refresh-documents')]
    public function refreshDocuments()
    {
        $this->submit();
    }
}
