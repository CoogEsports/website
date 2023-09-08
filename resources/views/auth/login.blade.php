<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="text-center">
        <h1 class="text-white font-bold display-6 text-5xl mb-4 tracking-wider uppercase font-chakra">Log in</h1>
        <p class="text-layer-200 text-xl mb-10 max-w-md mx-auto">Only log in with the credentials you have signed up with, not with your CougarNet credentials.</p>
    </div>

    @if($errors->any())
        @foreach ($errors->all() as $error)
        <x-alert-danger>
            {{$error}}
        </x-alert-danger>
        @endforeach
    @endif

    <form class="space-y-6" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" placeholder="{{ __('Enter your email') }}" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <!-- Password -->
        <div>
            <x-text-input id="password" class="block mt-2 w-full" type="password" name="password" placeholder="{{ __('Enter your password') }}" required autocomplete="current-password" />
        </div>

        <!--<div class="flex items-center justify-between">
            <div class="flex items-center">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded-0 border-layer-500 text-primary focus:ring-offset-0 p-2 focus:ring-2 focus:ring-primary focus:ring-offset-primary " name="remember" style="background-color: hsla(0, 0%, 100%, 0.03);">
                    <span class="ml-2 text-lg text-layer-200">{{ __('Remember me') }}</span>
                </label>
            </div>
            @if (Route::has('password.request'))
            <div class="text-sm leading-6">
                <a href="{{ route('password.request') }}" class="text-primary underline text-lg">{{ __('Forgot your password?') }}</a>
            </div>
            @endif
        </div>-->

        <x-primary-button class="w-full" size="lg">
            {{ __('Log in') }}
        </x-primary-button>
    </form>
</x-guest-layout>