<?php
// tests/Feature/CheckinPageTest.php

use Illuminate\Foundation\Testing\RefreshDatabase;

it('shows the check-in page with the assistant component', function () {
    $response = $this->get('/checkin');

    $response->assertStatus(200)
             ->assertSeeLivewire('customer-assistant')
             ->assertSee('Welcome to Bella');
});
