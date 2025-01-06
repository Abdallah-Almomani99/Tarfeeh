<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'category_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'image',
    ];

    /**
     * Relationship: A category has many venues.
     */
    public function activities()
    {
        return $this->hasMany(Activity::class, 'category_id', 'category_id');
    }
}
