<?php
// tests/Feature/NewCustomerComponentTest.php

use Livewire\Livewire;
use App\Services\RepairShoprService;
use Illuminate\Support\Facades\Session;

it('creates a new customer when none exists', function () {
    // Stub service to always return ID=123
    $this->instance(RepairShoprService::class, new class {
        public function findOrCreateCustomer($data) { return 123; }
    });

    Livewire::test('new-customer')
        ->set('first_name', 'John')
        ->set('last_name', 'Doe')
        ->set('email', 'john@doe.com')
        ->set('phone', '555-1234')
        ->set('address', '123 Main St')
        ->call('submit')
        ->assertSessionHas('message', 'Customer ready! ID: 123');
});

it('validates required fields', function () {
    Livewire::test('new-customer')
        ->set('first_name', '')   // missing
        ->set('last_name', 'Doe')
        ->call('submit')
        ->assertHasErrors(['first_name' => 'required']);
});
