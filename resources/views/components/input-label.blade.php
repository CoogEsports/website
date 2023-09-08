@props(['value'])

<label {{ $attributes->merge(['class' => '"block leading-6 text-white font-chakra leading-4 uppercase tracking-wider font-bold']) }}>
    {{ $value ?? $slot }}
</label>
