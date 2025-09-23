<div>
    <form class="
        w-full flex 
        @if ($isSearch)
            flex-row items-end
        @else
            flex-col
        @endif
        gap-4
    " wire:submit="submit">
        <div class="
            @if (!$isSearch)
                w-full flex-col
            @endif
            flex gap-4
        ">
            @if ($isSearch)
                <x-select-input wire:model.live="searchTerm">
                    <option value="id">id</option>
                    <option value="name">descrição</option>
                </x-select-input>
                <x-text-input wire:model.live="search" class="flex-grow w-full">Buscar</x-text-input>
            @else
                <label>Nome do credor</label>
                <x-text-input wire:model.live="name">Nome do credor</x-text-input>
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            @endif
        </div>
        <div>
            <x-button-dark wire:target="submit">Enviar</x-button-dark>
        </div>
    </form>
</div>