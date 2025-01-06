<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    use HasFactory;

    protected $primaryKey = 'hero_id';

    protected $fillable = ['image_path', 'date', 'title'];
}
