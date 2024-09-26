<x-app-layout>
    <!-- Main Container -->
    <div class="flex min-h-screen">

        <!-- Sidebar Component -->
        <x-sidebar />

        <!-- Main Content Area -->

            <!-- Header -->
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Admin Dashboard') }}
                </h2>
            </x-slot>

            <!-- Content Section -->
            <div class="mt-4">
                <h3 class="text-lg font-bold mb-4">Welcome to the Admin Dashboard!</h3>

                <!-- Dashboard content can go here -->
                <p>This is your dashboard content. Add any charts, statistics, or links as needed here.</p>
            </div>
        
    </div>
</x-app-layout>
