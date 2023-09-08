@props([
    'size' => 'md'
])

@php
$size = [
    'sm' => 'text-base py-5 px-7',
    'md' => 'text-lg py-8 px-10',
    'lg' => 'text-xl py-8 px-12',
][$size];
@endphp

<button {{ $attributes->merge(['type' => 'submit', 
    'class' => 'inline-flex items-center justify-center 
        bg-primary '.$size.' font-bold uppercase text-white tracking-wider font-chakra leading-4 
        transition ease-in-out hover:scale-105 duration-100 
        hover:shadow-lg hover:shadow-primary/50']) }} style="transform-style:preserve-3d ">
    {{ $slot }}
</button>
