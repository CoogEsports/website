<header class="z-50 w-full py-9 bg-transparent fixed">
    <div class="flex items-center justify-between max-w-7xl px-4 mx-auto sm:px-6 md:space-x-10">
        <div div class="flex flex-shrink-0 items-center">
            <a href="/"><!--<x-application-logo />--></a>
        </div>
        <nav class="hidden space-x-3 md:flex">
            <a href="/"><span class="font-bold text-gray-100 px-3 uppercase tracking-widest hover:text-esports transition-all" style="font-family: 'Chakra Petch', sans-serif;">Home</span></a>
            <a href="{{ route('about') }}"><span class="font-bold text-gray-100 px-3 uppercase tracking-widest hover:text-esports transition-all" style="font-family: 'Chakra Petch', sans-serif;">About</span></a>
            <a href="{{ route('teams') }}"><span class="font-bold text-gray-100 px-3 uppercase tracking-widest hover:text-esports transition-all" style="font-family: 'Chakra Petch', sans-serif;">Teams</span></a>
            @auth
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <a class="cursor-pointer"><span class="font-bold text-gray-100 px-3 uppercase tracking-widest hover:text-esports transition-all" style="font-family: 'Chakra Petch', sans-serif;">{{Auth::user()->name}}</span></a>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @else
            <a href="{{ route('login') }}"><span class="font-bold text-gray-100 px-3 uppercase tracking-widest hover:text-esports transition-all" style="font-family: 'Chakra Petch', sans-serif;">Log in</span></a>
            <a href="{{ route('register') }}"><span class="font-bold text-gray-100 px-3 uppercase tracking-widest hover:text-esports transition-all" style="font-family: 'Chakra Petch', sans-serif;">Register</span></a>
            @endauth
        </nav>
    </div>
</header>