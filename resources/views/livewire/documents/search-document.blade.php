@push('styles')
    <style>
        #document_list {
            display: flex;
            flex-direction: column; 
            flex-wrap: wrap;
            gap: 24px
        }

        #document_list > div {
            display: flex;
            gap: 16px;
            flex-direction: column;
        }

        #document_list > div > div {
            display: flex;
            flex-direction: row;
            padding: 16px;
        }

        #document_list > div > div > div:nth-last-child(1) {
            display: flex;
            flex-direction: column;
        }

        #document_list > div > div > div {
            display: flex;
            flex-direction: row;
            gap: 32px
        }

        #document_list > div > div > div > div {
            display: flex;
            flex-direction: column;
            gap: 2px
        }
    </style>
@endpush

<div>
    <h1>Buscar documento</h1>

    <livewire:forms.documents.search-document-form />

    @if (!$documents)
        <p>Nenhum documento encontrado</p>
    @else
        <div id="document_list">
            @foreach ($documents as $document)
                <div class="shadow-default relative flex-col flex">
                    <div class="relative flex-row gap-8">
                        <div class="relative gap-8">
                            <div>
                                <p><strong>Cod. do documento:</strong> {{ $document['document_id'] }}</p>
                                <p><strong>Cod. do processo:</strong> {{ $document['process_id'] }}</p>
                                <p><strong>Cod. do empenho:</strong> {{ $document['commit_id'] }}</p>
                                <p><strong>Caixa do documento:</strong> {{ $document['document_box'] }}</p>
                            </div>
                            <div>
                                <p><strong>Data do doc.:</strong> {{ $document['document_date'] }}</p>
                                <p><strong>Data de digitalização:</strong> {{ $document['digitalization_date'] }}</p>
                                <p><strong>Data de pagamento:</strong> {{ $document['payment_date'] }}</p>
                            </div>
                            <div>
                                <p><strong>Ano fiscal:</strong> {{ $document['financial_year'] }}</p>
                                <p><strong>Mês de referencia:</strong> {{ $document['reference_month'] }}</p>
                                <p><strong>Valor do pagamento:</strong> {{ $document['payment_billing'] }}</p>
                            </div>
                            <div>
                                <p><strong>Tipo de operação:</strong> {{ $document['operation_type_name'] }}</p>
                                <p><strong>Orgão responsavel:</strong> {{ $document['instituition']['name'] }}</p>
                                <p><strong>Credor responsavel:</strong> {{ $document['instituition']['name'] }}</p>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-col gap-8">
                                <p><strong>Criado em:</strong> {{ $document['created_at'] }}</p>
                                <p><strong>Atualizado em:</strong> {{ $document['updated_at'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <p class="w-[80%]"><strong>Historico:</strong> {{ $document['description'] }}</p>
                        </div>
                    </div>
                    <div class="absolute right-0 top-0">
                        <div class="gap-2">
                            <a href="{{ route('documents.edit', ['id' => $document['id']]) }}">
                                <x-button-light type="button"><x-css-pen /></x-button-light>
                            </a>
                            <a href="{{ route('pdf.generate', ['id' => $document['id']]) }}" target="_blank">
                                <x-button-light type="button"><x-css-file /></x-button-light>
                            </a>
                            <x-button-light 
                                type="button"
                                wire:click="destroy({{ $document['id'] }})"
                                wire:confirm="tem certeza que deseja deletar esse documento?"
                            ><x-css-trash /></x-button-light>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>