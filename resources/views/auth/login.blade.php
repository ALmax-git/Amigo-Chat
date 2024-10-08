@extends('layouts.auth')
@section('content')
        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}" id="formAuthentication" class="mb-3">
            @csrf
            <h2>Hay there! {{ session('username') ?? '' }}👋</h2>
            <p>Please sign-in to your account and start the adventure </p>
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="form-control" type="{{ session('email') != '' ? 'hidden' : 'email' }}" autocomplete="email" autofocus name="email" value="{{ session('email') ?? '' }}" required />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                &nbsp;
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                    {{ __('New Here!') }}
                </a>

                <x-button class="ms-4 btn btn-primary">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
@endsection
