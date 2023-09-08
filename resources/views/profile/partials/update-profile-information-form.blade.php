<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 bg-layer-600">
        <h2 class="text-white font-bold display-6 text-5xl mb-2 tracking-wider uppercase font-chakra">{{ __('Profile Information') }}</h2>
    </div>
    <div class="grid mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 bg-layer-700">

        <form method="post" action="{{ route('profile.update') }}" class="md:col-span-2 ">
            @csrf
            @method('patch')

            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:max-w-xl sm:grid-cols-6">
                <div class="sm:col-span-full">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-3 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                </div>

                <div class="col-span-full">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-3 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                        @endif
                    </div>
                    @endif
                </div>
                <div class="col-span-full">
                    <x-input-label for="uhid" :value="__('UH Identification Number')" />
                    <x-text-input id="uhid" class="block mt-3 w-full" type="text" name="uhid" :value="old('uhid', $user->uhid)" autocomplete="uhid" />
                </div>
                <div class="col-span-full">
                    <x-input-label for="shirt_size" :value="__('Shirt Size')" />

                    <x-select-input id="shirt_size" class="block mt-3 w-full" name="shirt_size" :value="old('shirt_size', $user->shirt_size)">
                        <option selected="" value="">You're currently a {{$user->size()}}</option>
                        <option value="XS">X-Small</option>
                        <option value="S">Small</option>
                        <option value="M">Medium</option>
                        <option value="L">Large</option>
                        <option value="XL">X-Large</option>
                        <option value="XXL">XX-Large</option>
                    </x-select-input>
                </div>
            </div>

            <div class="mt-8 flex">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</section>