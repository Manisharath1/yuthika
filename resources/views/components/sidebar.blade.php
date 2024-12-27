<!-- sidebar.blade.php -->
<div x-data="{ isSidebarOpen: false }" class="relative">
    <!-- Mobile Menu Button -->
    <button @click="isSidebarOpen = !isSidebarOpen"
            class="md:hidden fixed top-4 left-2 z-40 p-2 rounded-md bg-gray-800 text-white hover:bg-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path x-show="!isSidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            <path x-show="isSidebarOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>



    <!-- Sidebar -->
    <div :class="{'translate-x-0': isSidebarOpen, '-translate-x-full': !isSidebarOpen}"
         class="fixed md:static inset-y-0 left-0 z-30 w-64 bg-gray-900 text-gray-100 transition-transform duration-300 ease-in-out md:translate-x-0  flex flex-col h-screen">

        <!-- Logo and Brand -->
        <div class="p-4">
            <div class="flex items-center justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12">
            </div>
            <h2 class="text-center text-2xl mt-2 font-bold border-b border-gray-600 pb-2 text-white">{{ __('YUTHIKA') }}</h2>
        </div>

        <div class="flex-grow flex flex-col justify-between">

        <!-- Navigation Links -->
        <nav class="mt-6 space-y-1 px-2">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
               class="flex items-center p-3 text-gray-100 hover:bg-gray-700 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                <img src="{{ asset('icons/work-from-home.png') }}" alt="Home" class="h-6 w-6">
                <span class="ml-4 font-medium">Dashboard</span>
            </a>

            <!-- Monthly Progress Report Dropdown -->
            <div x-data="{ isOpen: false }">
                <button @click.prevent="isOpen = !isOpen"
                        class="w-full flex items-center justify-between p-3 text-gray-100 hover:bg-gray-700 rounded-lg transition-colors">
                    <div class="flex items-center">
                        <img src="{{ asset('icons/analysis.png') }}" alt="Analysis" class="h-6 w-6">
                        <span class="ml-4">Monthly Progress Report</span>
                    </div>
                    <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': isOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="isOpen" class="pl-12 space-y-1 mt-1" style="display: none;">
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg">
                        <img src="{{ asset('icons/progress-report.png') }}" alt="Progress" class="h-5 w-5 mr-3">
                        <span class="font-medium">Scholar / Project Staff</span>
                    </a>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-300 hover:text-white hover:bg-gray-700 rounded-lg">
                        <img src="{{ asset('icons/progress-report.png') }}" alt="Progress" class="h-5 w-5 mr-3">
                        <span class="font-medium">Outsourced Staff</span>
                    </a>
                </div>
            </div>

            <!-- Scholars Dropdown -->
            <div x-data="{ isOpen: false }">
                <!-- Monthly Progress Report (Main Menu Item) -->
                <a @click.prevent="isOpen = !isOpen" href="#" class="flex items-center justify-between p-4 text-white hover:bg-gray-700 transition-colors cursor-pointer">
                    <div class="flex items-center">
                        <img src="{{ asset('icons/scholar.png') }}" class="h-6 w-6">
                        <span class="ml-4">Scholars</span>
                    </div>
                    <!-- Dropdown Icon (chevron) -->
                    <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': isOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>

                <!-- Dropdown Menu -->
                <div x-show="isOpen" class="space-y-1 bg-gray-900 text-white pl-12" style="display: none;">
                    <!--  Manage Scholar -->
                    <a href="{{ route('scholar.index') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                        <img src="{{ asset('icons/ManageScholar.png') }}"  class="h-6 w-6   mr-3">
                        Manage Scholar
                    </a>

                    <!--  Manage Scholar Data-->
                    <a href="{{ route('scholar.personal') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                        <img src="{{ asset('icons/personal-data.png') }}"  class="h-6 w-6   mr-3">
                        Manage Scholar Personal Data
                    </a>
                    <!--  Manage Pre-PHD-->
                    <a href="{{ route('scholar.pre-PHD') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                        <img src="{{ asset('icons/certificate_16487651.png') }}"  class="h-6 w-6    mr-3">
                        Manage Pre-PHD
                    </a>
                    <!--  Manage RCB-->
                    <a href="{{ route('scholar.RCB') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                        <img src="{{ asset('icons/progress-report.png') }}"  class="h-6 w-6 mr-3">
                        Manage RCB
                    </a>
                </div>
            </div>

            <div x-data="{ isOpen: false }">
                <!-- Monthly Progress Report (Main Menu Item) -->
                <a @click.prevent="isOpen = !isOpen" href="#" class="flex items-center justify-between p-4 text-white hover:bg-gray-700 transition-colors cursor-pointer">
                    <div class="flex items-center">
                        <img src="{{ asset('icons/scholar.png') }}" class="h-6 w-6">
                        <span class="ml-4">Staff/Faculty</span>
                    </div>
                    <!-- Dropdown Icon (chevron) -->
                    <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': isOpen }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>

                <!-- Dropdown Menu -->
                <div x-show="isOpen" class="space-y-1 bg-gray-900 text-white pl-12" style="display: none;">
                    <!--  Manage Scholar -->
                    <a href="{{ route('faculty.index') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                        <img src="{{ asset('icons/ManageScholar.png') }}"  class="h-6 w-6   mr-3">
                        Manage Faculty
                    </a>

                    <!--  Manage Scholar Data-->
                    <a href="{{ route('staff.index') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                        <img src="{{ asset('icons/personal-data.png') }}"  class="h-6 w-6   mr-3">
                        Manage Staff
                    </a>
                </div>
            </div>

                <!-- Manage Projects -->
                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white hover:bg-gray-700 transition-colors">
                    <img src="{{ asset('icons/work-from-home.png') }}"  class="h-6 w-6">
                    <span class="ml-4">Manage Projects</span>
                </a>

                <!-- Leave Management -->
                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white hover:bg-gray-700 transition-colors">
                    <img src="{{ asset('icons/tomorrow.png') }}"  class="h-6 w-6">
                    <span class="ml-4">Leave Management</span>
                </a>

                <!-- User Log -->
                <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white hover:bg-gray-700 transition-colors">
                    <img src="{{ asset('icons/userlog.png') }}"  class="h-6 w-6">
                    <span class="ml-4">User Log</span>
                </a>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="w-full flex items-center p-3 text-red-400 hover:text-red-300 hover:bg-gray-700 rounded-lg transition-colors">
                    <img src="{{ asset('icons/shutdown.png') }}" alt="Logout" class="h-6 w-6">
                    <span class="ml-4 font-medium">Log Out</span>
                </button>
            </form>
        </div>
        </nav>
    </div>

    <!-- Overlay -->
    <div x-show="isSidebarOpen"
         @click="isSidebarOpen = false"
         class="fixed inset-0 z-20 bg-black bg-opacity-50 md:hidden"
         style="display: none;"></div>
</div>
