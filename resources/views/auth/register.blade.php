<x-guest-layout>

    <div class="text-center">
        <h1 class="text-white font-bold display-6 text-5xl mb-4 tracking-wider uppercase font-chakra">Register</h1>
        <p class="text-layer-200 text-xl mb-10 max-w-md mx-auto">Please make sure your name matches with your student name and payment method name.</p>
    </div>

    @if($errors->any())
    <x-alert-danger>
        There where {{$errors->count()}} error(s) while trying to register your account.</br>
        <div class="mt-2 text-layer-100 text-lg">
            <ul role="list" class="list-disc space-y-1 pl-5">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </x-alert-danger>
    @endif

    <form class="space-y-6" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full name')" />
            <x-text-input id="name" class="block mt-3 w-full" type="text" name="name" placeholder="Your name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-3 w-full" type="email" name="email" placeholder="gocoogs@notcougarnet.com" :value="old('email')" required autocomplete="username" />
        </div>

        <!-- UHID -->
        <div>
            <x-input-label for="uhid" :value="__('UH Identification Number')" />
            <x-text-input id="uhid" class="block mt-3 w-full" type="text" name="uhid" placeholder="XXXXXXX" :value="old('uhid')" required autocomplete="uhid" />
        </div>

        <!-- Shirt Size -->
        <div>
            <x-input-label for="shirt_size" :value="__('Shirt Size')" />

            <x-select-input id="shirt_size" class="block mt-3 w-full" name="shirt_size" :value="old('shirt_size')" required>
                <option selected="" value="">Select a size of shirt</option>
                <option value="XS">X-Small</option>
                <option value="S">Small</option>
                <option value="M">Medium</option>
                <option value="L">Large</option>
                <option value="XL">X-Large</option>
                <option value="XXL">XX-Large</option>
            </x-select-input>
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-3 w-full" type="password" name="password" placeholder="A super safe password" required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-2 w-full" type="password" name="password_confirmation" placeholder="Do you remember it?" required autocomplete="new-password" />
        </div>

        <x-primary-button class="w-full" size="lg">
            {{ __('Register') }}
        </x-primary-button>
</x-guest-layout>