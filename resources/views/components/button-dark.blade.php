<div>
    <button
        {{ $attributes->merge([
            'type' => 'submit',
            'class' => '
                shadow-default rounded-md p-2 
                bg-blue-800 text-white cursor-pointer
                w-full hover:brightness-80
                flex justify-center
            ',
        ]) }}
    >
        <span wire:loading.remove wire:target="{{ $attributes->get('wire:target') }}">{{ $slot }}</span>
        <x-css-spinner wire:loading wire:target="{{ $attributes->get('wire:target') }}" class="hidden animate-spin" />
    </button>
</div>