<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class GeneralController extends Controller
{
    protected $rules = [
        'phone_number' => 'required|numeric',
        'photo' => 'nullable|image|max:1024', // 1MB max
        'school_id' => 'required|string',
        'level_of_study' => 'required|string',
        'bio' => 'nullable|string|max:255',
        'age' => 'required|numeric|min:1|max:100',
    ];

    public function setup(Request $request)
    {
        // Validate the incoming request data
        $request->validate($this->rules);

        try {
            // Get the authenticated user
            $user = Auth::user();

            // Initialize data array for updating user
            $data = [
                'phone_number' => $request->phone_number,
                'school_id' => $request->school_id,
                'level_of_study' => $request->level_of_study,
                'is_student' => $request->is_student ?? false,
                'is_lecturer' => $request->is_lecturer ?? false,
                'is_admin' => $request->is_admin ?? false,
                'bio' => $request->bio,
                'age' => $request->age,
            ];

            // Handle photo upload
            if ($request->hasFile('photo')) {
                // Store the photo and get the path
                $photoPath = $request->file('photo')->store('profile_photos', 'public');
                $data['profile_photo_path'] = $photoPath;
            }

            // Update the authenticated user with the new data
            $user->update($data);

            // Optionally, you can set a success message
            // $this->alert('success', 'Profile updated successfully!');

            return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
        } catch (\Throwable $th) {
            // Log the exception for debugging (optional)
            \Log::error($th->getMessage());

            // Redirect back with an error message
            return redirect()->route('dashboard')->with('error', 'An error occurred while updating your profile.');
        }
    }
}
