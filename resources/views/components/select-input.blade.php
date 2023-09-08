@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full border border-layer-500 text-layer-400 hover:border-layer-200 focus:border-layer-200 focus:ring-0 px-6 uppercase text-white ease-in duration-150']) !!} style="height: 76px;background-color: hsla(0, 0%, 100%, 0.03);">
    {{$slot}}
</select>