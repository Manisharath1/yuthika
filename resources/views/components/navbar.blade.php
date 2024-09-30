<nav class="bg-gray-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex items-center">
                <div class="relative ">
                    <h2 class="text-2xl">DASHBOARD</h2>
                </div>
            </div>

            <!-- Right Side (Notification, Messages, Profile) -->
            <div class="flex items-center space-x-4">

                <!-- Notification Icon -->
                <button class="relative text-gray-400 hover:text-white focus:outline-none focus:text-white" aria-label="Notifications">
                    <img class="w-6 h-6" src="{{ asset('icons/Notify.png') }}" alt="Logo">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 17h5l-1.405 1.405C18.21 19.79 17.105 20 16 20h-8c-1.105 0-2.21-.21-2.595-.595L4 17h5" />
                    </img>
                </button>

                <!-- Messages Icon -->
                <button class="relative text-gray-400 hover:text-white focus:outline-none focus:text-white" aria-label="Messages">
                    <img class="w-6 h-6" src="{{ asset('icons/message.png') }}" alt="Logo">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M3 8h18M3 12h18M3 16h18" />
                    </img>
                </button>

                <div>
                <!-- User Profile -->
                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center p-4">
                    <img src="{{ asset('icons/user.png') }}"  class="h-8 w-8">
                </x-responsive-nav-link>
                </div>

            </div>
        </div>
    </div>
</nav>
