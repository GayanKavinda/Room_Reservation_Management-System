<?php

/* app/Models/Booking.php */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'date',
        'time_slot',
        'participants',
    ];

    // Relationships
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
