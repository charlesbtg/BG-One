<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\CheckinController;
use App\Http\Livewire\CheckinWizard;

Route::get('/', function () {
    return view('checkin');
})->name('checkin')
  ->name('home');

// Route::get('/checkin', CheckinWizard::class)
//    ->name('checkin');

Route::get('/checkin', function (){
    return view('checkin');
})->name('checkin');

Route::middleware(['auth']) //if you want only logged-in staff to see it
    ->get('/checkin', [CheckinController::class, 'index'])
    ->name('checkin.index');

Route::get('checkin/start', [CheckinController::class, 'start'])
    ->name('checkin.start');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
