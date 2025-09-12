<div>
    <form class="
        w-full flex flex-col 
        gap-4
    " wire:submit="submit">
        <div>
            <label>Codigo do documento</label>
            <x-text-input wire:model.live="documentID">999999999999</x-text-input>
            @error('documentID')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex gap-4 flex-row flex-wrap">
            <div class="grow">
                <label>Data do documento</label>
                <x-date-input wire:model.live="documentDate" />
                @error('documentDate')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grow">
                <label>Data da digitalizacao</label>
                <x-date-input wire:model.live="digitalizationDate" />
                @error('digitalizationDate')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grow">
                <label>Data de pagamento</label>
                <x-date-input wire:model.live="paymentDate" />
                @error('paymentDate')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex gap-4 flex-row">
            <div class="grow">
                <label>Exercicio</label>
                <x-select-input wire:model.live="financialYear">
                    <option selected>Selecione o ano de exercicio</option>
                    @for ($i = (int) date('Y'); $i >= 1900; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </x-select-input>
                @error('financialYear')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grow">
                <label>Mes de ref.</label>
                <x-select-input wire:model.live="referenceMonth">
                    <option selected>Selecione o mês de referencia</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </x-select-input>
                @error('referenceMonth')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex gap-4 flex-row">
            <div class="grow">
                <label>Num. do processo</label>
                <x-text-input
                    type="number"
                    wire:model.live="processID"
                >99999999</x-text-input>
                @error('processID')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grow">
                <label>Num. do empenho</label>
                <x-text-input
                    type="number"
                    wire:model.live="commitID"
                >99999999</x-text-input>
                @error('commitID')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grow">
                <label>Doc. de caixa</label>
                <x-text-input
                    type="number"
                    wire:model.live="documentBox"
                >99999999</x-text-input>
                @error('documentBox')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="relative">
            <label>Valor do pagamento</label>
            <x-text-input data-inputmask="'alias': 'currency'" wire:model.live="paymentBilling">0.00</x-text-input>
            @error('paymentBilling')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label>Historico</label>
            <x-text-field wire:model.live="description" />
            @error('description')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex gap-4 flex-row">
            <div class="grow">
                <label>Orgao</label>
                <x-select-input wire:model.live="instituitionID">
                    <option selected>Selecione o orgao responsavel</option>
                    @foreach ($instituitions as $instituition)
                        <option value="{{ $instituition->id }}">{{ $instituition->name }}</option>
                    @endforeach
                </x-select-input>
                @error('instituitionID')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="grow">
                <label>Credor</label>
                <x-select-input wire:model.live="creditorID">
                    <option selected>Selecione o credor responsavel</option>
                    @foreach ($creditors as $creditor)
                        <option value="{{ $creditor->id }}">{{ $creditor->name }}</option>
                    @endforeach
                </x-select-input>
                @error('creditorID')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex gap-4 flex-row">
            <div class="grow">
                <label>Tipo</label>
                <x-select-input wire:model.live="operationType">
                    <option>Tipo de operacao</option>
                    <option value="1">Pagamento</option>
                </x-select-input>
                @error('operationType')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div>
            <x-button-dark wire:target="submit">Enviar</x-button-dark>
        </div>
    </form>
</div>