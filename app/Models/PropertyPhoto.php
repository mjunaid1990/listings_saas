<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'file_path',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function getUrlAttribute()
    {
        // Check if the file exists
        if (file_exists(storage_path('app/public/' . $this->file_path))) {
            return asset('storage/' . $this->file_path);
        }
        
        // Return a default placeholder if file doesn't exist
        return 'https://placehold.co/64x64/eee/666';
    }
}
