<?php

namespace App\Livewire\Forms\Documents;

use App\Enums\OperationTypes;
use App\Livewire\Forms\Base\DocumentForm;
use App\Models\Creditor;
use App\Models\Document;
use App\Models\Instituition;
use Livewire\Attributes\On;
use Masmerise\Toaster\Toaster;

class StoreDocumentForm extends DocumentForm
{
    protected $attributesTranslatedNames = [
        'Cod. do documento' => 'documentID',
        'Cod. do processo' => 'processID',
        'Cod. do empenho' => 'commitID',
        'Caixa do documento' => 'documentBox',
        'Data do documento' => 'documentDate',
        'Data da digitalização' => 'digitalizationDate',
        'Data do pagamento' => 'paymentDate',
        'Ano fiscal' => 'financialYear',
        'Mês de referência' => 'referenceMonth',
        'Valor do pagamento' => 'paymentBilling',
        'Tipo de operação' => 'operationType',
        'Descrição' => 'description',
        'Orgão responsável' => 'instituitionID', 
        'Credor responsável' => 'creditorID',
    ];

    public function mount($document = null)
    {
        if ($document) {
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
    }

    protected function rules()
    {
        return array_map(function ($value) {
            return $value . '|required';
        }, $this->rules);
    }

    public function submit()
    {
        $this->validate();

        $paymentBilling = str_replace([',', '.'], '', $this->paymentBilling);

        $document = new Document;

        $document->document_id = $this->documentID;
        $document->process_id = $this->processID;
        $document->commit_id = $this->commitID;
        $document->document_box = $this->documentBox;
        $document->document_date = $this->documentDate;
        $document->digitalization_date = $this->digitalizationDate;
        $document->payment_date = $this->paymentDate;
        $document->financial_year = $this->financialYear;
        $document->reference_month = $this->referenceMonth;
        $document->payment_billing = $paymentBilling;
        $document->operation_type = $this->operationType;
        $document->description = $this->description;
        $document->instituition_id = $this->instituitionID;
        $document->creditor_id = $this->creditorID;

        $document->save();

        Toaster::success('Documento registrado com sucesso');
    
        $this->reset();
    }

    #[On('pdf-read')]
    public function setDocumentAttrByPDF($document_text)
    {
        $document_text = preg_replace("#[A-z]*\\r#", '', $document_text);

        foreach (explode("\n", $document_text) as $attr) {
            $attribute_translated_name = preg_replace('#([A-z]*)\:(.*)#', '$1', $attr);

            if (!isset($this->attributesTranslatedNames[$attribute_translated_name])) {
                continue;
            }                   
            
            $value = preg_replace('#([A-z.áàâãéèêíïóôõöúüç ]*)\: (.*)#', '$2',$attr);

            if ($attribute_translated_name == 'Tipo de operação') {
                $value = OperationTypes::getOperationByName($value);
            }

            if ($attribute_translated_name == 'Orgão responsável') {
                $instituition = Instituition::query()
                    ->where('name', '=', $value)
                    ->first();

                if ($instituition != null)
                    $value = $instituition->id;
            }

            if ($attribute_translated_name == 'Credor responsável') {
                $creditor = Creditor::query()
                    ->where('name', '=', $value)
                    ->first();

                if ($creditor != null)
                    $value = $creditor->id;
            }

            if (str_contains($attribute_translated_name, 'Data'))
                $value = preg_replace('#([0-9]{4}\-[0-9]{2}\-[0-9]{2}) ([0-9]{2}\:[0-9]{2}\:[0-9]{2})#', '$1', $value);

            $this->{$this->attributesTranslatedNames[$attribute_translated_name]} = $value;
        }
    }
}
