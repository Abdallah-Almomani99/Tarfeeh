<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Venue;
use App\Models\Booking;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\BookingAuthentication;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all(); // Get all users
        $users = User::all(); // Get all users
        $venues = Venue::all(); // Get all venues
        $activities = Activity::all(); // Get all activities

        return view('admin.bookings.index', compact('users', 'venues', 'activities', 'bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $venues = Venue::all();
        $activities = Activity::all(); // Get all activities
        $users = User::all(); // Get all users
        return view('admin.bookings.create', compact('users', 'venues', 'activities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingAuthentication $request)
    {
        $validatedData = $request->validated();
        Booking::create($validatedData);
        return redirect('/admin/bookings')->with('success', 'Booking Added Successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the booking by its ID
        $booking = Booking::findOrFail($id);

        // Validate the status value to be one of the allowed options
        $validated = $request->validate([
            'status' => 'required|in:Pending,Confirmed,Cancelled,Decline',  // Ensures the status is valid
        ]);

        // Update the booking status
        $booking->status = $validated['status'];
        $booking->save();

        // Redirect back with a success message
        return redirect()->route('bookings.index')->with('success', 'Booking status updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the booking to edit
        $booking = Booking::findOrFail($id);

        // Get all users, venues, and activities for the dropdown options
        $users = User::all();
        $venues = Venue::all();
        $activities = Activity::all();

        return view('admin.bookings.update', compact('booking', 'users', 'venues', 'activities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingAuthentication $request, string $id)
    {
        $validatedData = $request->validated();
        $booking = Booking::findOrFail($id);
        $booking->update($validatedData);
        return redirect('/admin/bookings')->with('success', 'Booking Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('booking.index')->with('success', 'Booking deleted successfully!');
    }
}
