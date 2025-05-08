<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Http;

class CheckinWizardTest extends TestCase
{
    public function test_lookup_sets_confirm_on_customer_found()
    {
        Http::fake([
            '*/api/v1/customers*' => Http::response([
                'customers' => [['id' => 789]],
            ], 200),
        ]);

        Livewire::test(\App\Http\Livewire\CheckinWizard::class)
            ->set('email', 'test@example.com')
            ->call('lookupCustomer')
            ->assertSet('customerId', 789)
            ->assertSet('step', 'confirm');
    }

    public function test_lookup_sets_newclient_if_not_found()
    {
        Http::fake([
            '*/api/v1/customers*' => Http::response(['customers' => []], 200),
        ]);

        Livewire::test(\App\Http\Livewire\CheckinWizard::class)
            ->set('email', 'foo@bar.com')
            ->call('lookupCustomer')
            ->assertSet('step', 'newClient');
    }

    public function test_create_new_client_sets_customerId_and_confirm()
    {
        Http::fake([
            '*/api/v1/customers' => Http::response([
                'customer' => ['id' => 321],
            ], 201),
        ]);

        Livewire::test(\App\Http\Livewire\CheckinWizard::class)
            ->set('firstName', 'Foo')
            ->set('lastName', 'Bar')
            ->set('email', 'foo@bar.com')
            ->set('phone', '1234567890')
            ->call('createNewClient')
            ->assertSet('customerId', 321)
            ->assertSet('step', 'confirm');
    }

    public function test_create_new_client_validation_fails_without_email()
    {
        Livewire::test(\App\Http\Livewire\CheckinWizard::class)
            ->set('firstName', 'Foo')
            ->set('lastName', 'Bar')
            ->set('phone', '1234567890')
            ->call('createNewClient')
            ->assertHasErrors(['email' => 'required']);
    }
}
