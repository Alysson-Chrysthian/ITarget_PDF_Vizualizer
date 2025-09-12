<div>
    <h1>Criar documento</h1>

    <livewire:forms.documents.store-document-form 
        :document="$document" 
        :wire:key="$document ? $document->id : 'new'" 
    />

    <input 
        type="file" 
        id="document-input" 
        class="hidden"
        wire:model.live="file"
    >
    <x-button-light 
        id="digitalization-button" 
        type="button"
    >Digitalizar</x-button-light>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const digitalizationButton = document.querySelector('#digitalization-button');
            const documentInput = document.querySelector('#document-input');

            digitalizationButton.addEventListener('click', (e) => {
                documentInput.click();
            });
        });
    </script>
@endpush
