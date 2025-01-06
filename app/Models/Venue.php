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
        'user_id',
        'image',
        'description',
        'type',
        'phone',
        'longitude',
        'latitude',
        'price_range',
        'status',
        'open_time',
        'close_time',

    ];

    /**
     * Relationship: A venue belongs to a category.
     */

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function bookings()
    {
        return $this->hasMany(Booking::class, 'venue_id');
    }

    public function images()
    {
        return $this->hasMany(VenueImage::class, 'venue_id');
    }
    public function activities()
    {
        return $this->hasMany(Activity::class, 'venue_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'venue_tag', 'venue_id', 'tag_id');
    }
}
