<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lead;

class LeadForm extends Component
{
    public $lead;
    public $name;
    public $email;
    public $phone;
    public $message;
    public $is_contacted = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'message' => 'required|string',
    ];

    public function mount(Lead $lead = null)
    {
        $this->lead = $lead;
        if ($lead) {
            $this->name = $lead->name;
            $this->email = $lead->email;
            $this->phone = $lead->phone;
            $this->message = $lead->message;
            $this->is_contacted = $lead->is_contacted;
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
            'is_contacted' => $this->is_contacted,
        ];

        if ($this->lead) {
            $this->lead->update($data);
        } else {
            $propertyId = request()->route('property');
            $data['property_id'] = $propertyId;
            $this->lead = Lead::create($data);
        }

        return redirect()->back()->with('success', 'Lead saved successfully');
    }

    public function render()
    {
        return view('livewire.leads.form')->layout('livewire.components.layouts.app');
    }
}
