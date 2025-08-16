<div>
    <select 
        {{ $attributes->merge([
            'class' => 'shadow-default rounded-md w-full p-2',
        ]) }}
    >
        {{ $slot }}
    </select>
</div>