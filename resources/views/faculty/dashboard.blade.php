<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faculty Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();" class="flex items-center py-2 hover:bg-gray-700 transition-colors text-xl text-red-700">
                             <img src="{{ asset('icons/shutdown.png') }}"  class="h-6 w-6 mr-4">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
</x-app-layout>
