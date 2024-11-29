<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'venue_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'phone',
        'longitude',
        'latitude',
        'price_range',
        'open_time',
        'close_time',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'venue_id');
    }
}
