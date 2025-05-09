<?php

namespace Tests\Feature;

use Tests\TestCase;

class MainPageTest extends TestCase
{
    public function test_home_and_checkin_routes_load()
    {
        $this->get(route('home'))->assertStatus(302);        // redirects to /checkin
        $this->get(route('checkin'))->assertStatus(200)
             ->assertSeeLivewire('checkin-wizard');         // built-in helper
    }
}