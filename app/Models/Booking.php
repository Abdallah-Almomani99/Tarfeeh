<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Define the primary key if it's different from 'id'
    protected $primaryKey = 'booking_id';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'user_id',
        'venue_id',
        'activity_id',
        'booking_date',
        'booking_time',
        'companions',
        'status'
    ];

    // Define the relationships

    /**
     * Get the user that owns the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the venue for the booking.
     */
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }

    /**
     * Get the activity for the booking.
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}
