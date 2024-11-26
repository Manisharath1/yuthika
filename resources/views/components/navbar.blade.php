<nav class="bg-gray-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left side with hamburger and dashboard -->
            <div class="flex items-center space-x-4">
                <!-- Mobile menu button -->
                <button
                    @click="isSidebarOpen = !isSidebarOpen"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white md:hidden"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg
                        class="h-6 w-6"
                        :class="{'hidden': isSidebarOpen, 'block': !isSidebarOpen }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Dashboard text -->
                <div class="flex items-center">
                    <h2 class="text-xl sm:text-2xl font-semibold whitespace-nowrap">DASHBOARD</h2>
                </div>
            </div>

            <!-- Right Side (Notification, Messages, Profile) -->
            <div class="flex items-center space-x-2 sm:space-x-4">
                <!-- Notification Icon -->
                <button class="relative p-1 text-gray-400 hover:text-white focus:outline-none focus:text-white rounded-full hover:bg-gray-700" aria-label="Notifications">
                    <span class="sr-only">View notifications</span>
                    <div class="relative">
                        <img class="w-6 h-6" src="{{ asset('icons/Notify.png') }}" alt="Notifications">
                        <!-- Notification badge - add if needed -->
                        <span class="absolute -top-1 -right-1 bg-red-500 rounded-full w-4 h-4 text-xs flex items-center justify-center" style="display: none;">
                            0
                        </span>
                    </div>
                </button>

                <!-- Messages Icon -->
                <button class="relative p-1 text-gray-400 hover:text-white focus:outline-none focus:text-white rounded-full hover:bg-gray-700" aria-label="Messages">
                    <span class="sr-only">View messages</span>
                    <div class="relative">
                        <img class="w-6 h-6" src="{{ asset('icons/message.png') }}" alt="Messages">
                        <!-- Message badge - add if needed -->
                        <span class="absolute -top-1 -right-1 bg-red-500 rounded-full w-4 h-4 text-xs flex items-center justify-center" style="display: none;">
                            0
                        </span>
                    </div>
                </button>

                <!-- User Profile -->
                <div class="relative">
                    <x-responsive-nav-link
                        :href="route('profile.edit')"
                        class="flex items-center p-1 rounded-full hover:bg-gray-700 transition duration-150 ease-in-out"
                    >
                        <img
                            src="{{ asset('icons/user.png') }}"
                            alt="Profile"
                            class="h-8 w-8 rounded-full object-cover"
                        >
                    </x-responsive-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Add this CSS to your stylesheet -->
<style>
@media (max-width: 768px) {
    .max-w-7xl {
        padding-left: 1rem;
        padding-right: 1rem;
    }
}

@media (max-width: 640px) {
    .space-x-4 > :not([hidden]) ~ :not([hidden]) {
        margin-left: 0.5rem;
    }
}
</style>
