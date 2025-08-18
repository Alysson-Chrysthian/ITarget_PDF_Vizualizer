<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class CreateDocument extends Component
{
    public $instituitions = [];

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

    public function render()
    {
        return view('livewire.create-document');
    }
}
