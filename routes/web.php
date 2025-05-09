<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\CheckinController;

// 1. Redirect root (/) to /checkin and name it `home`
Route::redirect('/', '/checkin')
     ->name('home');

// 2. Public check-in page: return the `checkin` view (which should include your <livewire:checkin-wizard />)
Route::view('/checkin', 'checkin')
     ->name('checkin');

// 3. Staff-only check-in dashboard & actions
Route::middleware(['auth'])->group(function () {
    // A staff dashboard of check-ins
    Route::get('/checkin/index', [CheckinController::class, 'index'])
         ->name('checkin.index');

    // Optional “start” endpoint
    Route::get('/checkin/start', [CheckinController::class, 'start'])
         ->name('checkin.start');
});

// 4. Dashboard & settings (no change)
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
