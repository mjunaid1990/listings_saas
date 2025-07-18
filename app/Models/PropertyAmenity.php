<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyAmenity extends Model
{
    protected $fillable = [
        'name',
        'category',
        'slug',
        'description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_amenity_pivot');
    }
}
