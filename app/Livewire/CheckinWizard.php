<?php
// app/Http/Livewire/CheckinWizard.php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckinWizard extends Component
{
    public string $step = 'start';

    // Make the component invokable so you can Route::get(..., CheckinWizard::class)
    public function __invoke()
    {
        return $this->render();
    }

    public function render()
    {
        return view('livewire.checkin-wizard');
    }
}
