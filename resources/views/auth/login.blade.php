<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        {{-- Social Login --}}
        <div class="flex items-center justify-between mt-4">

            {{-- Login With Google --}}
            <a href="{{ route('auth.redirection', 'google') }}"
                class="px-5 py-2 text-white bg-red-600 rounded-lg shadow-lg">Google</a>

            {{-- Login With Facebook --}}
            <a href="{{ route('auth.redirection', 'facebook') }}"
                class="px-5 py-2 text-white bg-blue-600 rounded-lg shadow-lg">Facebook</a>


            {{-- Login With Github --}}
            <a href="{{ route('auth.redirection', 'github') }}"
                class="px-5 py-2 text-white bg-red-600 rounded-lg shadow-lg">GitHub</a>

            {{-- Login With LinkedIn --}}
            <a href="{{ route('auth.redirection', 'linkedin-openid') }}"
                class="px-5 py-2 text-white bg-blue-600 rounded-lg shadow-lg">LinkedIn</a>
        </div>
    </form>
</x-guest-layout>
