<x-guest-layout>

   <div class="relative flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/yuthika-login.jpg') }}');">
        <!-- Background Overlay for Opacity -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

            <!-- Logo and Text Centered -->
            <div class="relative z-10 text-center">
                <!-- Logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-10 h-10 mt-4 mb-4">

                <!-- Text (YUTHIKA) -->
                <h1 class="text-white text-3xl font-bold mb-4">YUTHIKA</h1>
        </div>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            @if ($errors->has('role'))
                <div class="alert alert-danger" style="color: red; font-size: 12px;">
                    {{ $errors->first('role') }}
                </div>
            @endif

            <x-input-label for="role" :value="__('Login as')" />
            <select id="role" name="role" class="block mt-1 w-full" required>
                <option value="faculty">{{ __('Faculty') }}</option>
                <option value="staff">{{ __('Staff') }}</option>
                <option value="scholar">{{ __('Scholar') }}</option>
                <option value="admin">{{ __('Admin') }}</option>
            </select>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
