<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'name',
        'email',
        'phone',
        'message',
        'is_contacted',
    ];

    protected $casts = [
        'is_contacted' => 'boolean',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function getStatusLabelAttribute()
    {
        return $this->is_contacted ? 'Contacted' : 'Not Contacted';
    }

    public function getStatusColorAttribute()
    {
        return $this->is_contacted ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800';
    }
}
