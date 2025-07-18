<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Support\Facades\Stripe;

class SubscriptionForm extends Component
{
    public $plan;
    public $stripeKey;
    public $cardNumber;
    public $cardExpiry;
    public $cardCvc;
    public $error;

    protected $rules = [
        'cardNumber' => 'required|string|min:16|max:19',
        'cardExpiry' => 'required|date_format:m/Y|after:now',
        'cardCvc' => 'required|digits_between:3,4',
    ];

    public function mount(Plan $plan)
    {
        $this->plan = $plan;
        $this->stripeKey = config('services.stripe.key');
    }

    public function subscribe()
    {
        $this->validate();

        try {
            $stripeCustomer = auth()->user()->createOrGetStripeCustomer();

            $stripeSubscription = Stripe\Subscription::create([
                'customer' => $stripeCustomer->id,
                'items' => [[
                    'price' => $this->plan->stripe_plan_id,
                ]],
                'payment_behavior' => 'default_incomplete',
                'expand' => ['latest_invoice.payment_intent'],
            ]);

            $subscription = Subscription::create([
                'user_id' => auth()->id(),
                'plan_id' => $this->plan->id,
                'status' => 'incomplete',
                'stripe_subscription_id' => $stripeSubscription->id,
                'current_period_end' => now()->addDays(7), // Trial period
            ]);

            return redirect()->route('subscriptions.confirm', $subscription);
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.subscriptions.form')->layout('livewire.components.layouts.app');
    }
}
