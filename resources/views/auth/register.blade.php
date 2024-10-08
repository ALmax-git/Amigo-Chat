@extends('layouts.auth')
@section('content')
<x-validation-errors class="mb-4" />

@session('status')
<div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
    {{ $value }}
</div>
@endsession
<form method="POST" id="formAuthentication" class="mb-3" action="{{ route('register') }}">
    @csrf
    <h4 class="mb-2">Welcome Amigo! 👋</h4>
    <div>
        <x-label for="name" value="{{ __('Name') }}" />
        <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus
            autocomplete="name" />
    </div>

    <div class="mb-3">
        <x-label for="email" value="{{ __('Email') }}" />
        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required
            autocomplete="username" />
    </div>

    <div class="mb-3 form-password-toggle">
        <x-label for="password" value="{{ __('Password') }}" />
        <div class="input-group input-group-merge">
            <input id="password" class="form-control" type="password" id="password" name="password" required
                autocomplete="new-password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
    </div>

    <div class="mb-3">
        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />

        <div class="input-group input-group-merge">
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                required autocomplete="new-password" />
            {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
        </div>
    </div>

    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
    <div class="mb-3">
        <x-label for="terms">
            <div class="flex items-center">
                <x-checkbox name="terms" id="terms" required />

                <div class="ms-2">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms
                        of Service').'</a>',
                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy
                        Policy').'</a>',
                    ]) !!}
                </div>
            </div>
        </x-label>
    </div>
    @endif
    <div class="mb-3">
        <button class="btn btn-primary d-grid w-100" type="submit">Create Account</button>
    </div>
    <div class="flex justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

    </div>
</form>
@endsection
