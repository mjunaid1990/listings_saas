<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Property $property)
    {
        return $user->id === $property->user_id;
    }

    public function create(User $user)
    {
        // Check if user has active subscription
        if (!$user->hasActiveSubscription()) {
            return false;
        }

        // Check if user has reached their listing limit
        $plan = $user->currentPlan();
        $currentListings = $user->properties()->count();

        return $currentListings < $plan->max_listings;
    }

    public function update(User $user, Property $property)
    {
        return $user->id === $property->user_id;
    }

    public function delete(User $user, Property $property)
    {
        return $user->id === $property->user_id;
    }
}
