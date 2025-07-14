<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
    ];

    // Relationships
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
