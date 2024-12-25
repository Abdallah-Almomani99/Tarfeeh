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
        'category_id', // Foreign key for the category
    ];

    /**
     * Relationship: A venue belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'venue_id');
    }

    public function images()
    {
        return $this->hasMany(VenueImage::class, 'venue_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'venue_tag', 'venue_id', 'tag_id');
    }
}
