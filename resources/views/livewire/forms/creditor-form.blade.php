<div>
    <form class="
        w-full flex flex-col 
        gap-4
    " wire:submit="submit">
        <div>
            <label>Nome do credor</label>
            <x-text-input wire:model.live="name">Nome do credor</x-text-input>
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-button-dark wire:target="submit">Enviar</x-button-dark>
        </div>
    </form>
</div>