<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\CheckinController;
use App\Http\Livewire\CheckinWizard;

// 1) Redirect “/” → “/checkin”
Route::redirect('/', '/checkin')->name('home');

// 2) Serve a wrapper Blade that *contains* your Livewire component
Route::view('/checkin', 'checkin')->name('checkin');

// 3) Staff & other routes…
Route::middleware('auth')->group(function () {
    // …
});

Route::get('/checkin', function () {
    return view('customers.checkin');
});

// 2. Dashboard & settings (no change)
Route::view('dashboard', 'dashboard')
     ->middleware(['auth', 'verified'])
     ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile',    'settings.profile')->name('settings.profile');
    Volt::route('settings/password',   'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
