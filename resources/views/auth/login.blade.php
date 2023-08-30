<x-guest-layout>
    <x-authentication-card>
        {{-- <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot> --}}

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        {{-- <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form> --}}

        <section class="h-screen">
            <div class="h-full">
                <!-- Left column container with background-->
                <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
                    <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                        <img src="https://freesvg.org/img/1536261140.png"
                            class="w-full" alt="Sample image" />
                    </div>

                    <!-- Right column container -->
                    <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf


                            <!-- Email input -->
                            <div class="relative mb-6" data-te-input-wrapper-init>
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autocomplete="username" />

                            </div>

                            <!-- Password input -->
                            <div class="relative mb-6" data-te-input-wrapper-init>
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />

                            </div>

                            <div class="mb-6 flex items-center justify-between">
                                <!-- Remember me checkbox -->
                                <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
                                        <x-checkbox id="remember_me" name="remember" />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer text-gray-700"
                                        for="exampleCheck2">
                                        {{ __('Remember me') }}
                                    </label>

                                </div>

                                <!--Forgot password link-->
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>

                            <!-- Login button -->
                            <div class="text-center lg:text-left">
                                <x-button class="ml-4">
                                    {{ __('Login') }}
                                </x-button>

                                <!-- Register link -->
                                {{-- <p class="mb-0 mt-2 pt-1 text-sm">
                                    Have an account?
                                    <a href="{{ route('login') }}"
                                        class="text-danger font-semibold transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700">Login</a>
                                </p> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </x-authentication-card>
</x-guest-layout>
