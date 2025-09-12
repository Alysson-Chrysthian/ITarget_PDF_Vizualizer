<div>
    <button
        {{ $attributes->merge([
            'type' => 'submit',
            'class' => '
                shadow-default rounded-md p-2 
                bg-black text-white cursor-pointer
                w-full hover:bg-white hover:text-black
                flex justify-center
            ',
        ]) }}
    >
        <span wire:loading.remove wire:target="{{ $attributes->get('wire:target') }}">{{ $slot }}</span>
        <x-css-spinner wire:loading wire:target="{{ $attributes->get('wire:target') }}" class="hidden animate-spin" />
    </button>
</div>