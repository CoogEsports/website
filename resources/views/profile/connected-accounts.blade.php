<x-app-layout>
    <header class="border-b border-white/5">
        <!-- Secondary navigation -->
        <nav class="flex overflow-x-auto py-4">
            <ul role="list" class="flex min-w-full flex-none gap-x-6 px-4 text-sm font-semibold leading-6 text-gray-400 sm:px-6 lg:px-8">
                <li>
                    <a href="{{ route('profile.edit') }}" class="text-primary">Account</a>
                </li>
                <li>
                    <a href="#" class="">Connected Accounts</a>
                </li>
                <li>
                    <a href="#" class="">Billing</a>
                </li>
                <li>
                    <a href="#" class="">Teams</a>
                </li>
                <li>
                    <a href="#" class="">Integrations</a>
                </li>
            </ul>
        </nav>
    </header>
</x-app-layout>