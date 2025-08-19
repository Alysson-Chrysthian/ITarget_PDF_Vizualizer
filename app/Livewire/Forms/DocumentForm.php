<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Http;
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
            //
        ];
    }

    protected function validationAttributes()
    {
        return [
            //
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
                        $data[] = $value;
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
