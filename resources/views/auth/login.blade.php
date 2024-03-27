
<div style="position: relative; width: 100vw; height: 100vh;">
    <!-- Video Background -->
    <video autoplay muted loop id="video-background" style="position: absolute; top: -118px; ">
        <source src="../images/BG1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Form -->
    <div style="position: relative; z-index: 1;" class="bg-transparent-custom">

        <x-guest-layout class="bg-cover ">


            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg bg-transparent">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Check if there are any validation errors -->
                    <!-- Check if there is a specific error message from the controller -->
                    @if (session('error'))
                        <div>
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <!-- Email Address -->
                    <div>
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

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="ml-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </x-guest-layout>
    </div>
</div>
