<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueImage extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['venue_id', 'image'];

    // Define the relationship with the Venue model
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id'); // Specify the foreign key
    }
}
