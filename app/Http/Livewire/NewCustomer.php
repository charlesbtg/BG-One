<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\RepairShoprService;
use Exception;

class NewCustomer extends Component
{
    public $first_name;
    public $last_name;
    public $business_name;
    public $phone;
    public $email;
    public $address;
    public $referred_by;

    protected $rules = [
        'first_name'    => 'required|string|max:50',
        'last_name'     => 'required|string|max:50',
        'business_name' => 'nullable|string|max:100',
        'phone'         => 'required|string',
        'email'         => 'required|email',
        'address'       => 'required|string',
        'referred_by'   => 'nullable|string|max:100',
    ];

    public function submit(RepairShoprService $rs)
    {
        $this->validate();

        try {
            // Find or create the customer
            $customerId = $rs->findOrCreateCustomer([
                'first_name'    => $this->first_name,
                'last_name'     => $this->last_name,
                'business_name'=> $this->business_name,
                'phone'         => $this->phone,
                'email'         => $this->email,
                'address'       => $this->address,
                'referred_by'   => $this->referred_by,
            ]);

            session()->flash('message', 'Customer ready! ID: ' . $customerId);
            $this->reset();
        } catch (Exception $e) {
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.new-customer');
    }
}