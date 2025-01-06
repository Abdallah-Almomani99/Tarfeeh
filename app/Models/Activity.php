<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'activity_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'venue_id',
        'description',
        'price',
        'gender',
        'duration',
        'allowed_age',
        'capacity',
        'created_at',
        'updated_at',
        'category_id', // Foreign key for the category
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'price' => 'float',
        'duration' => 'integer',
        'allowed_age' => 'integer',
        'capacity' => 'integer',
    ];

    /**
     * Relationship with the Venue model.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'venue_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'activity_id');
    }
}
