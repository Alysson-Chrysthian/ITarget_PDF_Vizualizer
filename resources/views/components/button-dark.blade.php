<div>
    <button
        {{ $attributes->merge([
            'type' => 'submit',
            'class' => '
                shadow-default rounded-md p-2 
                bg-black text-white cursor-pointer
                w-full hover:bg-white hover:text-black
            ',
        ]) }}
    >{{ $slot }}</button>
</div>