<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Exception;

class RepairShoprService
{
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.repairshopr.url');
        $this->apiKey   = config('services.repairshopr.key');
    }
    
    public function findCustomerByTerm(string $term): array
    {
        $response = Http::withToken($this->apiKey)
            ->get("{$this->baseUrl}/customers/search", ['term' => $term]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new Exception("Error searching customers: " . $response->body());
    }

    public function createCustomer(array $data): array
    {
        $response = Http::withToken($this->apiKey)
            ->post("{$this->baseUrl}/customers", [
                'first_name'   => $data['first_name'],
                'last_name'    => $data['last_name'],
                'company_name' => $data['business_name'] ?? null,
                'phone'        => $data['phone'],
                'email'        => $data['email'],
                'address'      => $data['address'],
                'referred_by'  => $data['referred_by'] ?? null,
            ]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new Exception("Error creating customer: " . $response->body());
    }

    public function findOrCreateCustomer(array $data): int
    {
        $term = $data['email'] ?? $data['phone'];
        $customers = $this->findCustomerByTerm($term);

        if (!empty($customers)) {
            return $customers[0]['id'];
        }

        $created = $this->createCustomer($data);
        return $created['id'];
    }

    public function createTicket(int $customerId, array $data): array
    {
        $response = Http::withToken($this->apiKey)
            ->post("{$this->baseUrl}/tickets", [
                'customer_id' => $customerId,
                'subject'     => $data['subject'] ?? 'Service Request',
                'status'      => $data['status'] ?? 'new',
                'device'      => $data['device'] ?? null,
                'description' => $data['description'] ?? null,
            ]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new Exception("Error creating ticket: " . $response->body());
    }
}
