<?php
// app/Http/Livewire/CheckinWizard.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\RepairShoprService;
class CheckinWizard extends Component
{
    public string $method = 'email';
    public ?int $customerId = null;
    public string $email = '';
    public string $phone = '';
    public string $step = 'lookup';

    protected RepairShoprService $rs;

    public function mount(RepairShoprService $repairShopr)
    {
        $this->rs = $repairShopr;
        $this->method = 'email';
    }

    public function lookupCustomer()
    {
        $term = $this->email ?: $this->phone;
        $customer = $this->rs->findCustomerByTerm($term);

        if ($customer) {
            $this->customerId = $customer['id'];
            $this->step       = 'confirm';
        } else {
            $this->step = 'newClient';
        }
    }

    public function createNewClient()
    {
        $data = $this->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
        ]);
    
        $customer = $this->rs->createCustomer([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        $this->customerId = $customer['id'];
        $this->step       = 'confirm';
    }

    public function render()
    {
        return view('livewire.checkin-wizard');
    }
}