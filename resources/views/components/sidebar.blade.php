
<div class="min-h-screen bg-gray-800 text-white w-64 flex flex-col">
    <!-- Logo or Brand -->
    <div class="p-4 flex items-center justify-center">
        <img src="{{ asset('images/logo.png') }}"class="h-12 w-12">
    </div>
    <div>
        <h2 class="p-4 flex items-center justify-center text-2xl" style="text-decoration: underline ">{{ __('YUTHIKA') }}</h2>
    </div>


    <!-- Navigation Links -->
    <nav class="mt-10">

        <!-- Users -->
        <a href="{{ route('dashboard') }}" class="flex items-center p-4 text-white hover:bg-gray-700 transition-colors">
            <img src="{{ asset('icons/work-from-home.png') }}"  class="h-6 w-6">
            <span class="ml-4">Home</span>
        </a>

        <div>
        {{-- <!-- Dashboard -->
        <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center p-4 text-white hover:bg-gray-700 transition-colors">
            <img src="{{ asset('icons/profile.png') }}"  class="h-6 w-6">
            <span class="ml-4">Profile</span>
        </x-responsive-nav-link>
        </div> --}}


        <div x-data="{ open: false }">
            <!-- Monthly Progress Report (Main Menu Item) -->
            <a @click.prevent="open = !open" href="#" class="flex items-center justify-between p-4 text-white hover:bg-gray-700 transition-colors cursor-pointer">
                <div class="flex items-center">
                    <img src="{{ asset('icons/analysis.png') }}" class="h-6 w-6">
                    <span class="ml-4">Monthly Progress Report</span>
                </div>
                <!-- Dropdown Icon (chevron) -->
                <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>

            <!-- Dropdown Menu -->
            <div x-show="open" class="space-y-1 bg-gray-900 text-white pl-12" style="display: none;">
                <!-- Project Staff Link -->
                <a href="{{ route('dashboard') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                    <img src="{{ asset('icons/progress-report.png') }}"  class="h-5 w-5 mr-3">
                    Scholar / Project Staff
                </a>

                <!-- Outsourced Staff Link -->
                <a href="{{ route('dashboard') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                    <img src="{{ asset('icons/progress-report.png') }}"  class="h-5 w-5 mr-3">
                    Outsourced Staff
                </a>
            </div>
        </div>
        <div x-data="{ open: false }">
            <!-- Monthly Progress Report (Main Menu Item) -->
            <a @click.prevent="open = !open" href="#" class="flex items-center justify-between p-4 text-white hover:bg-gray-700 transition-colors cursor-pointer">
                <div class="flex items-center">
                    <img src="{{ asset('icons/scholar.png') }}" class="h-6 w-6">
                    <span class="ml-4">Scholars</span>
                </div>
                <!-- Dropdown Icon (chevron) -->
                <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>

            <!-- Dropdown Menu -->
            <div x-show="open" class="space-y-1 bg-gray-900 text-white pl-12" style="display: none;">
                <!--  Manage Scholar -->
                <a href="{{ route('dashboard') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                    <img src="{{ asset('icons/ManageScholar.png') }}"  class="h-6 w-6   mr-3">
                    Manage Scholar
                </a>

                <!--  Manage Scholar Data-->
                <a href="{{ route('dashboard') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                    <img src="{{ asset('icons/personal-data.png') }}"  class="h-6 w-6   mr-3">
                    Manage Scholar Personal Data
                </a>
                <!--  Manage Pre-PHD-->
                <a href="{{ route('dashboard') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                    <img src="{{ asset('icons/certificate_16487651.png') }}"  class="h-6 w-6    mr-3">
                    Manage Pre-PHD
                </a>
                <!--  Manage RCB-->
                <a href="{{ route('dashboard') }}" class="flex items-center py-2 hover:bg-gray-700 transition-colors">
                    <img src="{{ asset('icons/progress-report.png') }}"  class="h-6 w-6 mr-3">
                    Manage RCB
                </a>
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
    </nav>
</div>
