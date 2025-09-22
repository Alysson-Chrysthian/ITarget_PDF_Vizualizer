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
        <div class="w-full">
            <label>Nome do orgao</label>
            <x-text-input wire:model.live="name">Nome do orgao</x-text-input>
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-button-dark wire:target="submit">Enviar</x-button-dark>
        </div>
    </form>
</div>