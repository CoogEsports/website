<x-app-layout>
    <div class="relative isolate overflow-hidden" style="background-image: url(https://assets.website-files.com/60358955e12a8a2413b99edc/603810f50c0e56435c5367de_bg-blog-hero-esports-template.jpg)">
        <div class="mx-auto max-w-7xl px-6 pt-10 lg:px-8 lg:pt-56 lg:pb-12">
            <div class="mx-auto max-w-4xl lg:mx-0 lg:pt-8">
                <h1 class="text-white font-bold display-6 text-7xl mb-2 tracking-wider uppercase font-chakra">{{ __('Profile') }}</h1>
            </div>
        </div>
    </div>
    @include('profile.partials.update-profile-information-form')
    @include('profile.partials.update-password-form')
    @include('profile.partials.delete-user-form')
</x-app-layout>