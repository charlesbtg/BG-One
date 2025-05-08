<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RepairShoprService
{
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.repairshopr.url');
        $this->apiKey   = config('services.repairshopr.key');
    }

    public function findCustomerByTerm(string $term)
    {
        // GET /api/v1/customers?term={email or phone}
        return Http::withToken($this->apiKey)
            ->get("{$this->baseUrl}/api/v1/customers", ['term' => $term])
            ->throw()
            ->json('customers.0'); // return first match or null
    }

    public function createCustomer(array $data)
    {
        // POST /api/v1/customers
        return Http::withToken($this->apiKey)
            ->post("{$this->baseUrl}/api/v1/customers", ['customer' => $data])
            ->throw()
            ->json('customer');
    }
}
