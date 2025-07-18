<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Plan;

class PlanList extends Component
{
    public function render()
    {
        return view('livewire.plans.list', [
            'plans' => Plan::all()
        ])->layout('livewire.components.layouts.app');
    }
}
