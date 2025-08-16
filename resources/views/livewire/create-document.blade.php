<div class="max-w-[500px] m-auto flex flex-col gap-4">
    <h1 class="text-center">Dados do documento</h1>

    <form class="
        w-full flex flex-col 
        gap-4
    ">
        <div>
            <label>Codigo do documento</label>
            <x-text-input>Codigo do documento</x-text-input>
        </div>

        <div class="flex gap-4 flex-row">
            <div class="grow">
                <label>Data do documento</label>
                <x-date-input />
            </div>
            <div class="grow">
                <label>Data da digitalizacao</label>
                <x-date-input />
            </div>
            <div class="grow">
                <label>Data de pagamento</label>
                <x-date-input />
            </div>
        </div>

        <div class="flex gap-4 flex-row">
            <div class="grow">
                <label>Exercicio</label>
                <x-select-input>
                    @for ($i = (int) date('Y'); $i >= 1900; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </x-select-input>
            </div>
            <div class="grow">
                <label>Mes de ref.</label>
                <x-select-input>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </x-select-input>
            </div>
        </div>

        <div class="flex gap-4 flex-row">
            <div class="grow">
                <label>Num. do processo</label>
                <x-text-input
                    type="number"
                >Numero do processo</x-text-input>
            </div>
            <div class="grow">
                <label>Num. do empenho</label>
                <x-text-input
                    type="number"
                >Numero do empenho</x-text-input>
            </div>
            <div class="grow">
                <label>Doc. de caixa</label>
                <x-text-input
                    type="number"
                >Doc. de caixa</x-text-input>
            </div>
        </div>

        <div class="relative">
            <label>Valor do pagamento</label>
            <x-text-input>Valor do pagamento</x-text-input>
            <span class="absolute top-1/2 right-2">R$</span>
        </div>

        <div>
            <label>Historico</label>
            <x-text-field />
        </div>

        <div>
            <label>Orgao</label>
            <x-select-input>
                <option selected disabled>Orgao responsavel</option>
            </x-select-input>
        </div>

        <div class="flex gap-4 flex-row">
            <div class="grow">
                <label>Tipo</label>
                <x-select-input>
                    <option value="1">Pagamento</option>
                </x-select-input>
            </div>
            <div class="grow">
                <label>Credor</label>
                <x-select-input>
                    <option selected disabled>Credor responsavel</option>
                </x-select-input>
            </div>
        </div>

        <div>
            <x-button-dark>Digitalizar</x-button-dark>
        </div>
    </form>
</div>
