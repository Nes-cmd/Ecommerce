<x-guest-layout>
    <x-jet-authentication-card class="shadow border-2">
        <x-slot name="logo">
            <h2 class="text-3xl font-bold">{{env('APP_NAME')}}</h2>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="h-14">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 pl-2 h-10 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div class="mt-4 h-12">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full h-10 pl-2" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4 mr-2">
                    {{ __('Log in') }}
                </x-jet-button>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Don\'t have account?') }}
                </a>
                <a class="underline text-sm text-gray-600 hover:text-gray-900 ml-3" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
