<x-app-layout>
    <!-- Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Main Content Area -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Button -->
    <div class="fixed bottom-4 right-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-200">
                <img src="{{ asset('icons/shutdown.png') }}" class="h-5 w-5 mr-2">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-app-layout>

