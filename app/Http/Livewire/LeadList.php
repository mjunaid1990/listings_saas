<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;

class LeadList extends Component
{
    public function render()
    {
        $leads = Lead::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.leads.list', ['leads' => $leads]);
    }
}
