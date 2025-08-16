<div>
    <input 
        {{ $attributes->merge([
            'type' => 'text',
            'class' => 'shadow-default rounded-md w-full p-2',
            'placeholder' => $slot,
        ]) }}
    >
</div>