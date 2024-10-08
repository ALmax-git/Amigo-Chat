<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;
// use Livewire\WithFileUploads;

class Setup extends Component
{
    use LivewireAlert;
    // use WithFileUploads;

    // Public properties for user profile fields
    public $phone_number;
    public $photo;
    public $school_id;
    public $level_of_study;
    public $is_student;
    public $is_lecturer;
    public $is_admin;
    public $bio;
    public $age;
    public $status;
    public $user;
    protected $rules = [
        'phone_number' => 'required|digits:10',
        'photo' => 'nullable|image|max:1024', // 1MB max
        'school_id' => 'required|string',
        'level_of_study' => 'required|string',
        'bio' => 'nullable|string|max:255',
        'age' => 'required|numeric|min:1|max:100',
    ];

    public function mount()
    {
        // Initialize the form with the current authenticated user's data
        $this->alert('success', 'Enter valid details!');
        $this->user =  Auth::user();
        $user = $this->user;;
        $this->phone_number = $user->phone_number;
        $this->school_id = $user->school_id;
        $this->level_of_study = $user->level_of_study;
        $this->is_student = $user->is_student;
        $this->is_lecturer = $user->is_lecturer;
        $this->is_admin = $user->is_admin;
        $this->bio = $user->bio;
        $this->age = $user->age;
        $this->status = $user->status;
    }

    public function updateProfile()
    {
        $this->alert('success', 'Profile update started!');
        $this->validate();
        $this->alert('success', 'Profile validated successfully!');

        // Get the current authenticated user
        // // $user = ;
        dd($this);
        // try {
        // dd($this,);
        //code...// Update the user profile
        $this->user->update([
            'phone_number' => $this->phone_number,
            'school_id' => $this->school_id,
            'level_of_study' => $this->level_of_study,
            'is_student' => $this->is_student,
            'is_lecturer' => $this->is_lecturer,
            'is_admin' => $this->is_admin,
            'bio' => $this->bio,
            'age' => $this->age,
            // 'status' => $this->status,
            // 'profile_photo_path' => $this->photo ? $this->photo->store('profile_photos', 'public') : $user->profile_photo_path,
        ]);
        $this->alert('success', 'Profile updated successfully!');
        // } catch (\Throwable $th) {
        //throw $th;
        $this->alert('error', 'Profile not updated!');
        // }
    }
    public function render()
    {
        return view('livewire.setup');
    }
}
