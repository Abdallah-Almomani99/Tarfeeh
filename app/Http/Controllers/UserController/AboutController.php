<?php

namespace App\Http\Controllers\UserController;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        // Get the total number of users
        $totalUsers = DB::table('users')->count();

        // Get the total number of venues
        $totalVenues = DB::table('venues')->count();

        // Get the total number of activities
        $totalActivities = DB::table('activities')->count();

        // Return the data to the view
        return view('user.about', compact('totalUsers', 'totalVenues', 'totalActivities'));
    }
}
