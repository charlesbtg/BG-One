<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Services\RepairShoprService;

class RepairShoprServiceTest extends TestCase
{
    public function test_find_customer_by_term_returns_customer()
    {
        // Stub a successful lookup response
        Http::fake([
            '*/api/v1/customers?term=john@example.com' => Http::response([
                'customers' => [
                    ['id' => 123, 'first_name' => 'John', 'last_name' => 'Doe'],
                ],
            ], 200),
        ]);

        $service = new RepairShoprService();
        $customer = $service->findCustomerByTerm('john@example.com');

        $this->assertNotNull($customer);
        $this->assertEquals(123, $customer['id']);
    }

    public function test_find_customer_by_term_returns_null_when_not_found()
    {
        // Stub an empty result
        Http::fake([
            '*/api/v1/customers?term=foo@bar.com' => Http::response(['customers' => []], 200),
        ]);

        $service = new RepairShoprService();
        $this->assertNull($service->findCustomerByTerm('foo@bar.com'));
    }

    public function test_create_customer_returns_new_customer()
    {
        // Stub the POST /customers response
        Http::fake([
            '*/api/v1/customers' => Http::response([
                'customer' => ['id' => 456],
            ], 201),
        ]);

        $service = new RepairShoprService();
        $new = $service->createCustomer([
            'first_name' => 'Jane',
            'last_name'  => 'Smith',
            'email'      => 'jane@example.com',
            'phone'      => '555-1234',
        ]);

        $this->assertEquals(456, $new['id']);
    }
}
