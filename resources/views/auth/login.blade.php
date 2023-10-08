
<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Login</title>
    </head>
    <body>
    <section class="flex flex-col md:flex-row h-screen items-center">

        <div class="bg-gray-900 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen items-center">
            <img src="{{asset('assets/img/lms2.jpg')}}" alt="" class="w-full h-full object-cover">
        </div>


        <div class="bg-white w-full md:max-w-md lg:max-w-full  md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">

            <div class="w-full h-100 items-center">
                <div class="flex items-center justify-center">
                    <a href="/">
                        <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo" width="250" class="rounded-full border-2 border-white p-2">
                    </a>
                </div>





                <h1 class="text-center text-4xl md:text-4xl font-bold leading-tight mt-12 text-black-100">Log in </h1>
                <x-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <form  class="mt-6"  method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <label class="block text-black-100" for="email" value="{{ __('Email') }}">Email Address </label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300 focus:bg-white focus:outline-none" />
                    </div>

                    <div class="mt-4">
                        <label class="block text-black-100" for="password" value="{{ __('Password') }}">Password </label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-purple-300
                focus:bg-white focus:outline-none"/>
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-black-100">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-black-100 hover:text-black rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-100" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif



                    </div>
                    <button type="submit" class="w-full block bg-gray-900 text-white   hover:text-blue-200  border border-amber-100  font-semibold rounded-lg
              px-4 py-3 mt-6"> {{ __('Log in') }}</button>
                </form>





                <p class="mt-8 text-black">Need an account? <a href="{{ route('register') }}" class="text-black-100 hover:text-black font-semibold">Create an
                        account</a></p>


            </div>
        </div>

    </section>
    </body>
    </html>
