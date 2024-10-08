<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('test', function () {
    // return redirect()->route('login');
    return view('test');
})->name('gate');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->phone_number != null) {
            return view('dashboard');
        } else {
            return view('setup');
        }
    })->name('dashboard');
    Route::post('/setup', [GeneralController::class, 'setup'])->name('setup');
});