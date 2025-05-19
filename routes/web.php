<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\CheckinController;
use App\Http\Livewire\CheckinWizard;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/checkin', [CheckinController::class, 'index'])
     ->middleware(['auth', 'verified'])
     ->name('checkin');

Route::get('/checkin/wizard', CheckinWizard::class)
     ->middleware(['auth', 'verified'])
     ->name('checkin.wizard');
     
Route::post('logout', LogoutController::class)
     ->name('logout');

// 1) Redirect “/” → “/checkin”
//Route::redirect('/', '/checkin')->name('home');

// 2) Show our Livewire wrapper view
// Route::get('/checkin', function () {
//    return view('checkin');
// })->name('checkin');

// 3) Dashboard & settings (unchanged)
Route::view('dashboard', 'dashboard')
     ->middleware(['auth','verified'])
     ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile',    'settings.profile')->name('settings.profile');
    Volt::route('settings/password',   'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
