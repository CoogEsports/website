@props(['title', 'tagline'])

<div class="relative isolate overflow-hidden" style="background-image: url(https://assets.website-files.com/60358955e12a8a2413b99edc/603810f50c0e56435c5367de_bg-blog-hero-esports-template.jpg)">
    <div class="mx-auto max-w-7xl px-6 pt-10 lg:px-8 lg:pt-56 lg:pb-28">
        <div class="mx-auto max-w-2xl lg:mx-0 lg:pt-8">
            <h1 class="text-white font-bold display-6 text-7xl mb-2 tracking-wider uppercase font-chakra">{{ $title }}</h1>
            <p class="text-white text-2xl mb-10">{{ $tagline }}</p>
            {{ $slot }}
        </div>
    </div>
</div>