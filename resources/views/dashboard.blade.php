<x-app-layout>
    <div class="relative isolate overflow-hidden" style="background-image: url(https://assets.website-files.com/60358955e12a8a2413b99edc/603810f50c0e56435c5367de_bg-blog-hero-esports-template.jpg)">
        <div class="mx-auto max-w-7xl px-6 pt-10 lg:px-8 lg:pt-56 lg:pb-12">
            <div class="mx-auto max-w-4xl lg:mx-0 lg:pt-8">
                <h1 class="text-white font-bold display-6 text-7xl mb-2 tracking-wider uppercase font-chakra">Welcome back, <br>{{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border-l-4 border-primary bg-primary/50 p-4 mt-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-white h-8 w-8" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-lg text-white">
                            {{ __('Your email address is unverified.') }}
                            <a href="#" class="text-primary/100 hover:underline hover:text-white">{{ __('Click here to go to your profile and resend the verification email.') }}</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="border-l-4 border-primary bg-primary/50 p-4 mt-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="text-white h-8 w-8" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-lg text-white">
                            {{ __('You have not yet paid any membership dues.') }}
                            <a href="#" class="text-primary/100 hover:underline hover:text-white">{{ __('Click here to pay your membership dues and unlock additional features.') }}</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>