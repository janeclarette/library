<div style="position: relative; display: flex; justify-content: center;">
    <!-- Video Background -->
    <video autoplay muted loop id="video-background" style="position: absolute; top: -118px;">
        <source src="../images/BG1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Form -->
    <div style="position: relative; ">

        <x-guest-layout>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="w-full">
                <form method="POST" action="{{ route('login') }}" class="relative px-9 py-10">

                    @csrf

                    <!-- Check if there are any validation errors -->
                    <!-- Check if there is a specific error message from the controller -->
                    @if (session('error'))
                        <div>
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <h1 class="text-center text-2xl font-bold -mt-3.5 mb-2">Log in</h1>
                    <p class=" text-center mb-2">Welcome back, you've been missed!</p>

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

                    <div class=" -mb-2 mt-2"> <!-- Moved the button to the bottom and added margin-top for spacing -->
                        <div class="flex items-center justify-end">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            <x-primary-button class="bg-amber-950 button ml-4">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </x-guest-layout>
    </div>
</div>
