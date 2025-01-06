<?php

namespace App\Http\Controllers\AdminController;

use Carbon\Carbon;

use App\Models\User;
use App\Models\Booking;
use App\Models\Activity;
use App\Models\HeroSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $slides = HeroSlide::all();
        // Get the bookings for the current month
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        $monthlyBookings = Booking::whereBetween('bookings.created_at', [$currentMonthStart, $currentMonthEnd])
            ->where('status', 'confirmed')
            ->join('activities', 'bookings.activity_id', '=', 'activities.activity_id') // join with the activities table
            ->count(); // Assuming amount is in the booking table

        // Get total bookings (confirmed status)
        $totalBookings = Booking::where('status', 'confirmed')->join('activities', 'bookings.activity_id', '=', 'activities.activity_id') // join with the activities table
            ->count();
        // Calculate monthly revenue (5% of confirmed bookings' activity price)
        $monthlyRevenue = Booking::whereBetween('bookings.created_at', [$currentMonthStart, $currentMonthEnd])
            ->where('status', 'confirmed')
            ->join('activities', 'bookings.activity_id', '=', 'activities.activity_id')
            ->sum(DB::raw('activities.price * 0.05'));

        // Calculate total revenue (5% of confirmed bookings' activity price)
        $totalRevenue = Booking::where('status', 'confirmed')
            ->join('activities', 'bookings.activity_id', '=', 'activities.activity_id')
            ->sum(DB::raw('activities.price * 0.05'));

        // Get the latest registered users (for recent sales section)
        $latestUsers = User::latest()->take(5)->get(); // You can adjust the number as needed

        return view('admin.dashboard', compact('monthlyBookings', 'totalBookings', 'monthlyRevenue', 'totalRevenue', 'latestUsers', 'slides'));
    }
}
