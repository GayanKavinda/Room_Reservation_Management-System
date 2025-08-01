<?php

/* app/Models/Room.php */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'location_id',
        'capacity_min',
        'capacity_max',
        'price_per_hour',
        'type',
        'image_url',
        'features',
        'description',
        'rating',
        'reviews',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    // Relationships
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
