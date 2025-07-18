<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    protected $fillable = [
        'user_id',
        'property_type_id',
        'title',
        'slug',
        'description',
        'price',
        'address',
        'latitude',
        'longitude',
        'status',
        'property_status',
        'bedrooms',
        'bathrooms',
        'square_feet',
        'lot_size',
        'year_built',
        'currency',
        'hoa_fees',
        'property_taxes',
        'stories',
        'has_basement',
        'garage_spaces',
        'heating_type',
        'cooling_type',
        'roof_type',
        'flooring_type',
        'exterior_material',
        'has_pool',
        'has_fireplace',
        'energy_efficiency_rating',
        'is_smart_home',
        'additional_features',
        'rental_terms',
        'legal_documents',
        'virtual_tour',
        'floor_plans',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'price' => 'float',
        'square_feet' => 'float',
        'lot_size' => 'float',
    ];

    protected $attributes = [
        'address' => '',
        'latitude' => null,
        'longitude' => null,
        'status' => 'active',
        'property_status' => 'for_sale',
        'currency' => 'USD',
        'bedrooms' => null,
        'bathrooms' => null,
        'square_feet' => null,
        'lot_size' => null,
        'year_built' => null,
        'stories' => null,
        'garage_spaces' => null,
        'hoa_fees' => null,
        'property_taxes' => null,
        'has_basement' => 0,
        'has_pool' => 0,
        'has_fireplace' => 0,
        'is_smart_home' => 0,
        'additional_features' => null,
        'amenities' => null,
        'rental_terms' => null,
        'legal_documents' => null,
        'virtual_tour' => null,
        'floor_plans' => null,
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($property) {
            $originalSlug = Str::slug($property->title);
            $slug = $originalSlug;
            $counter = 1;

            // Check if slug exists and add counter if needed
            while (Property::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $property->slug = $slug;
        });

        static::updating(function ($property) {
            // Only generate new slug if it's empty
            if (empty($property->slug)) {
                $originalSlug = Str::slug($property->title);
                $slug = $originalSlug;
                $counter = 1;

                // Check if slug exists and add counter if needed
                while (Property::where('slug', $slug)
                    ->where('id', '!=', $property->id)
                    ->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }

                $property->slug = $slug;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function features()
    {
        return $this->belongsToMany(PropertyFeature::class, 'property_feature_pivot');
    }

    public function amenities()
    {
        return $this->belongsToMany(PropertyAmenity::class, 'property_amenity_pivot');
    }

    public function getMainPhotoAttribute()
    {
        return $this->photos()->first();
    }

    public function getPhotoUrlAttribute()
    {
        if ($this->main_photo) {
            return asset('storage/' . $this->main_photo->file_path);
        }
        return 'https://placehold.co/64x64/eee/666';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeWithinRadius($query, $latitude, $longitude, $radius)
    {
        return $query->selectRaw(
            '*, ( 3959 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
            [$latitude, $longitude, $latitude]
        )->having('distance', '<', $radius);
    }

    /**
     * Scope a query to search properties by title, description, or address.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
        }
        return $query;
    }
}
