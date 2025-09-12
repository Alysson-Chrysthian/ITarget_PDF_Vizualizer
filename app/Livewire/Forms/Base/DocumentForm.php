<?php

namespace App\Livewire\Forms\Base;

use App\Models\Creditor;
use App\Models\Instituition;
use Livewire\Component;

class DocumentForm extends Component
{
    public $documentID, $documentDate, $digitalizationDate, $paymentDate, 
        $financialYear, $referenceMonth, $processID, $commitID, $documentBox, 
        $paymentBilling, $description, $instituitionID, $operationType, $creditorID;

    protected $rules = [
        'documentID' => 'numeric|digits:12',
        'documentDate' => 'date',
        'digitalizationDate' => 'date',
        'paymentDate' => 'date',
        'financialYear' => 'numeric|digits:4',
        'referenceMonth' => 'numeric|max_digits:2',
        'processID' => 'numeric|digits:8',
        'commitID' => 'numeric|digits:8',
        'documentBox' => 'numeric|digits:8',
        'paymentBilling' => 'regex:/^\d{1,3}(\,\d{3})*.\d{2}$/',
        'description' => 'string|max:500',
        'instituitionID' => 'exists:instituitions,id',
        'creditorID' => 'exists:creditors,id',
        'operationType' => 'in:1',
    ];

    protected function rules()
    {
        return $this->rules;
    }

    protected function validationAttributes()
    {
        return [
            'documentID' => 'codigo do documento',
            'documentDate' => 'data do documento',
            'digitalizationDate' => 'data de digitalizacao',
            'paymentDate' => 'dia do pagamento',
            'financialYear' => 'ano de exercicio',
            'referenceMonth' => 'mes de referencia',
            'processID' => 'codigo do processo',
            'commitID' => 'codigo do empenho',
            'documentBox' => 'caixa do documento',
            'paymentBilling' => 'valor do pagamento',
            'description' => 'historico',
            'instituitionID' => 'orgao responsavel',
            'operationType' => 'tipo de operacao',
            'creditorID' => 'credor responsavel',
        ];
    }

    public function updated($attributeName)
    {
        $this->validateOnly($attributeName);
    }

    public function submit()
    {
        $this->validate();
    }

    public function render()
    {
        $instituitions = Instituition::all();
        $creditors = Creditor::all();

        return view('livewire.forms.document-form', [
            'instituitions' => $instituitions,
            'creditors' => $creditors,
        ]);
    }
}