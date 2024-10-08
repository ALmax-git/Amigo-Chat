@extends('layouts.auth')
@section('content')

<div>
    <h4 class="mb-2">Update Your Profile 🚀</h4>
    <div id="formAuthentication" class="mb-3">
        @csrf

        <!-- Profile Photo Upload -->
        {{-- <div class="mb-3">
            @if ($photo)
            <div>
                <label>Photo Preview:</label>
                <img style="border-radius: 10px;" width="100" src="{{ $photo->temporaryUrl() }}">
            </div>
            @endif
            @error('photo') <span class="error">{{ $message }}</span> @enderror
            <label for="photo" class="form-label">Profile picture</label>
            <input type="file" wire:model="photo" class="form-control" id="photo" />
        </div> --}}

        <!-- Phone Number Input -->
        <div class="mb-3">
            <x-label for="phone_number" value="{{ __('Phone number') }}" />
            <x-input id="phone_number" class="form-control" type="tel" wire:model="phone_number"
                autocomplete="phone_number" autofocus name="phone_number" required />
            @error('phone_number') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- Other Fields -->
        <div class="mb-3">
            <x-label for="school_id" value="{{ __('School ID') }}" />
            <x-input id="school_id" class="form-control" wire:model="school_id" />
            @error('school_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <x-label for="level_of_study" value="{{ __('Level of Study') }}" />
            <x-input id="level_of_study" class="form-control" wire:model="level_of_study" />
            @error('level_of_study') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <x-label for="bio" value="{{ __('Bio') }}" />
            <textarea id="bio" class="form-control" wire:model="bio"></textarea>
            @error('bio') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <x-label for="age" value="{{ __('Age') }}" />
            <x-input id="age" type="number" class="form-control" wire:model="age" />
            @error('age') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- Checkbox for Student, Lecturer, Admin -->
        <div class="mb-3">
            <x-label for="is_student" value="{{ __('Are you a student?') }}" />
            <input type="checkbox" id="is_student" wire:model="is_student" />
            @error('is_student') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <x-label for="is_lecturer" value="{{ __('Are you a lecturer?') }}" />
            <input type="checkbox" id="is_lecturer" wire:model="is_lecturer" />
            @error('is_lecturer') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <x-label for="is_admin" value="{{ __('Are you an admin?') }}" />
            <input type="checkbox" id="is_admin" wire:model="is_admin" />
            @error('is_admin') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button wire:click='updateProfile' class="btn btn-primary d-grid w-100">Update Profile</button>
    </div>
    <div class="text-center">
        <a href="/" class="d-flex align-items-center justify-content-center">
            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
            Back to home
        </a>
    </div>
</div>

@endsection