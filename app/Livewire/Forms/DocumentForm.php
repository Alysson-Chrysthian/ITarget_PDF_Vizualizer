<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Picqer\Barcode\Renderers\HtmlRenderer;
use Picqer\Barcode\Types\TypeCode128;

class DocumentForm extends Component
{
    public $documentID, $documentDate, $digitalizationDate, $paymentDate, 
        $financialYear, $referenceMonth, $processID, $commitID, $documentBox, 
        $paymentBilling, $description, $instituition, $operationType;
    public $instituitions = [];
    public $placeholder, $functionality = '', $validate = false;

    protected function rules()
    {
        $validation_rules = [
            'documentID' => 'nullable|numeric|digits:12',
            'documentDate' => 'nullable|date',
            'digitalizationDate' => 'nullable|date',
            'paymentDate' => 'nullable|date',
            'financialYear' => 'nullable|numeric|digits:4',
            'referenceMonth' => 'nullable|numeric|max_digits:2',
            'processID' => 'nullable|numeric|digits:8',
            'commitID' => 'nullable|numeric|digits:8',
            'documentBox' => 'nullable|numeric|digits:8',
            'paymentBilling' => 'nullable|numeric',
            'description' => 'nullable|string|max:500',
            'instituition' => 'nullable|' . Rule::in(array_keys($this->instituitions)),
            'operationType' => 'nullable|' . Rule::in([1]),
        ];

        if ($this->validate) {
            foreach ($validation_rules as $field => $rules) {
                $validation_rules[$field] = str_replace('nullable', 'required', $validation_rules[$field]);
            }
        }

        return $validation_rules;
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
            'instituition' => 'orgaor responsavel',
            'operationType' => 'tipo de operacao',
        ];
    }

    public function updated($attributeName)
    {
        $this->validateOnly($attributeName);
    }

    public function mount()
    {
        $this->instituitions = cache()->remember('instituitions', now()->addMonth(), function () {
            $data = [];
            $page = 1;

            do {
                $response = Http::withHeaders([
                        'chave-api-dados' => env('GOV_API_KEY'),
                    ])->get('https://api.portaldatransparencia.gov.br/api-de-dados/orgaos-siafi', [
                        'pagina' => $page,
                    ])->json();

                foreach ($response as $value) {
                    if (!str_starts_with($value['descricao'], 'CODIGO INVALIDO')) {
                        $data[$value['codigo']] = $value;
                    }
                }

                $page++;
            } while (!empty($response));

            return $data;
        });
    }

    public function store()
    {
        $this->validate();
    }

    public function search()
    {
        $this->validate();
    }

    public function update()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.forms.document-form');
    }
}
