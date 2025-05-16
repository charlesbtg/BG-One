<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\RepairShoprService;

class CheckinWizard extends Component
{
    public $issueType, $description, $assets = [], $selectedWorksheet;
    public $issueTypes = [], $assetTypes = [], $worksheets = [];

    public function mount()
    {
        $this->issueTypes = [
            'Advanced/Custom Diagnostics',
            'Computer Cleanup',
            'Data Transfer',
            'Misc. Work and Notes',
            'New PC Setup',
            'Onsite',
            'PC/Mac Diagnostics',
            'Phone Worksheet',
            'ThreatDown/Malwarebytes',
        ];

        $this->assetTypes = ['Laptop','Desktop','Tablet','Phone','Other'];

        $this->worksheets = $this->issueTypes; // same list in your example

        $this->assets = [
            ['type'=>'','name'=>'','serial'=>''],
        ];
    }

    public function render()
    {
        return view('livewire.checkin-wizard');
    }

    public function addAsset()
    {
        $this->assets[] = ['type'=>'','name'=>'','serial'=>''];
    }

    public function removeAsset($idx)
    {
        unset($this->assets[$idx]);
        $this->assets = array_values($this->assets);
    }

    public function submit()
    {
        $this->validate([
            'issueType'         => 'required',
            'description'       => 'required|string',
            'assets.*.type'     => 'required',
            'assets.*.name'     => 'required',
            'assets.*.serial'   => 'required',
            'selectedWorksheet' => 'required',
        ]);

        $payload = [
            'subject'     => $this->issueType,
            'description' => $this->description,
            // custom_fields etc…
        ];

        $customerId = 42;
        $svc = app(RepairShoprService::class);
        $ticket = $svc->createTicket($customerId, $payload);

        session()->flash('message', "✅ Ticket created! ID: {$ticket['ticket_id']}");

        $this->reset(['issueType','description','assets','selectedWorksheet']);
        $this->mount();
    }
}
