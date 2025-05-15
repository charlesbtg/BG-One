<?php
// tests/Feature/NewCustomerComponentTest.php

use Tests\TestCase;
use Livewire\Livewire;
use App\Livewire\NewCustomer;
use App\Services\RepairShoprService;

uses(TestCase::class);

it('creates a new customer when none exists', function () {
    // Stub the service so findOrCreateCustomer() always returns 123
    $this->instance(RepairShoprService::class, new class {
        public function findOrCreateCustomer($data) { return 123; }
    });

    Livewire::test(NewCustomer::class)
        ->set('first_name', 'John')
        ->set('last_name',  'Doe')
        ->set('email',      'john@doe.com')
        ->set('phone',      '555-1234')
        ->set('address',    '123 Main St')
        ->set('referred_by', null)
        ->call('submit')
        ->assertSessionHas('message', 'Customer ready! ID: 123');
});

it('validates required fields', function () {
    Livewire::test(NewCustomer::class)
        ->set('first_name', '')   // missing
        ->set('last_name',  'Doe')
        ->call('submit')
        ->assertHasErrors(['first_name' => 'required']);
});
