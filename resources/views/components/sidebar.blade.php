<div class="min-h-screen bg-gray-800 text-white w-64 flex flex-col">
    <!-- Logo or Brand -->
    <div class="p-4 flex items-center justify-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12">
    </div>

    <!-- Navigation Links -->
    <nav class="mt-10">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white hover:bg-gray-700 transition-colors">
            <img src="{{ asset('icons/dashboard.svg') }}"  class="h-6 w-6">
            <span class="ml-4">Dashboard</span>
        </a>

        <!-- Users -->
        <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white hover:bg-gray-700 transition-colors">
            <img src="{{ asset('icons/users.svg') }}"  class="h-6 w-6">
            <span class="ml-4">Users</span>
        </a>

        <!-- Settings -->
        <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white hover:bg-gray-700 transition-colors">
            <img src="{{ asset('icons/settings.svg') }}"  class="h-6 w-6">
            <span class="ml-4">Settings</span>
        </a>

        <!-- Logout -->
        <a href="{{ route('logout') }}" class="flex items-center p-4 text-white hover:bg-gray-700 transition-colors">
            <img src="{{ asset('icons/logout.svg') }}"  class="h-6 w-6">
            <span class="ml-4">Logout</span>
        </a>
    </nav>
</div>
