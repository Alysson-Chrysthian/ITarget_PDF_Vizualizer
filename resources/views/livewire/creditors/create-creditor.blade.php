<div>
    <h1>Criar credor</h1>

    <livewire:forms.creditors.store-creditor-form />

    <a href="{{ route('creditors.search') }}">
        <x-button-dark
            type="button"
        >
            Buscar
        </x-button-dark>
    </a>
</div>
