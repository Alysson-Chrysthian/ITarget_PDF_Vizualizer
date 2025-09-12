<?php

namespace App\Livewire\Forms\Documents;

use App\Livewire\Forms\Base\DocumentForm;
use App\Models\Document;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class UpdateDocumentsForm extends DocumentForm
{
    public $document;

    public function mount($document) 
    {
        $this->document = $document;
    
        $this->documentID = $document->document_id;
        $this->processID = $document->process_id;
        $this->commitID = $document->commit_id;
        $this->documentBox = $document->document_box;

        $this->documentDate = $document->document_date;
        $this->digitalizationDate = $document->digitalization_date;
        $this->paymentDate = $document->payment_date;

        $this->financialYear = $document->financial_year;
        $this->referenceMonth = $document->reference_month;
        $this->paymentBilling = $document->payment_billing;
        $this->operationType = $document->operation_type;

        $this->description = $document->description;

        $this->instituitionID = $document->instituition_id;
        $this->creditorID = $document->creditor_id;
    }

    protected function rules()
    {
        return array_map(function ($value) {
            return 'required|' . $value;
        }, $this->rules);
    }

    public function submit()
    {
        $this->validate();

        $this->document->update([
            'document_id' => $this->documentID,
            'process_id' => $this->processID,
            'commit_id' => $this->commitID,
            'document_box' => $this->documentBox,

            'document_date' => $this->documentDate,
            'digitalization_date' => $this->digitalizationDate,
            'payment_date' => $this->paymentDate,

            'financial_year' => $this->financialYear,
            'reference_month' => $this->referenceMonth,
            'payment_billing' => $this->paymentBilling,
            'operation_type' => $this->operationType,
            
            'description' => $this->description,

            'instituition_id' => $this->instituitionID,
            'creditor_id' => $this->creditorID,
        ]);

        Toaster::success('Documento atualizado com sucesso');
    }
}
