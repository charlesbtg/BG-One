<?php

use function Pest\Laravel\get;

it('shows the checkin page', function () {
    get('/checkin')
        ->assertStatus(200)
        ->assertSee('Welcome to Bella’s Check‑In')
        ->assertSee('Start Check‑In');
});
