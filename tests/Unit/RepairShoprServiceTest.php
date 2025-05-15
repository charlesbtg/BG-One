<?php
// tests/Unit/RepairShoprServiceTest.php

use Tests\TestCase;
use App\Services\RepairShoprService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Http\Client\Request;

uses(TestCase::class);

it('searches customers by term', function () {
    Http::fake([
        '*' => Http::response([
            ['id' => 42, 'first_name' => 'Jane']
        ], 200),
    ]);

    $svc = new RepairShoprService();
    $results = $svc->findCustomerByTerm('jane@example.com');

    expect($results)
        ->toBeArray()
        ->and($results[0]['id'])->toBe(42);

    Http::assertSent(function (Request $req) {
        return Str::endsWith($req->url(), '/customers/search')
            && $req->data()['term'] === 'jane@example.com';
    });
});

it('creates a ticket for a customer', function () {
    Http::fake([
        '*' => Http::response(['ticket_id' => 99], 201),
    ]);

    $svc = new RepairShoprService();
    $ticket = $svc->createTicket(42, ['subject' => 'Repair']);

    expect($ticket['ticket_id'])->toBe(99);
});
