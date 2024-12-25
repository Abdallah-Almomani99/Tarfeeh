<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\Category;
use App\Models\VenueImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showCategories()
    {
        // Fetch random categories with their images
        $categories = Category::inRandomOrder()->limit(11)->get(['name', 'image']);
        $venues = Venue::with('images')->inRandomOrder()->limit(3)->get();
        return view('user.home', compact('categories', 'venues'));
    }
}
