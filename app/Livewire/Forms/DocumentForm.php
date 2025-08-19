<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Livewire\Component;

class DocumentForm extends Component
{
    public $documentID, $documentDate, $digitalizationDate, $paymentDate, 
        $financialYear, $referenceMonth, $processID, $commitID, $documentBox, 
        $paymentBilling, $description, $instituition, $operationType;
    public $instituitions = [];
    public $placeholder, $functionality = '';

    protected function rules()
    {
        return [
            'documentID' => 'required|numeric|digits:12',
            'documentDate' => 'required|date',
            'digitalizationDate' => 'required|date',
            'paymentDate' => 'required|date',
            'financialYear' => 'required|numeric|digits:4',
            'referenceMonth' => 'required|numeric|max_digits:2',
            'processID' => 'required|numeric|digits:8',
            'commitID' => 'required|numeric|digits:8',
            'documentBox' => 'required|numeric|digits:8',
            'paymentBilling' => 'required|numeric',
            'description' => 'required|string|max:500',
            'instituition' => 'required|' . Rule::in(array_keys($this->instituitions)),
            'operationType' => 'required|' . Rule::in([1]),
        ];
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
        //
    }

    public function search()
    {
        //
    }

    public function update()
    {
        //
    }

    public function render()
    {
        return view('livewire.forms.document-form');
    }
}
