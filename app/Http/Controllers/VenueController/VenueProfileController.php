<?php

namespace App\Http\Controllers\VenueController;


use App\Models\Tag;
use App\Models\User;
use App\Models\Venue;
use App\Models\Booking;
use App\Models\Activity;
use App\Models\Category;
use App\Models\VenueImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VenueValidation;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ActivityValidation;
use App\Http\Requests\VenueAuthentication;
use Illuminate\Support\Facades\Auth; // For accessing the logged-in user

class VenueProfileController extends Controller
{
    /**
     * Show data for the logged-in venue.
     */
    public function create()
    {


        $allTags = Tag::all();
        return view('venue.create', compact('allTags')); // Pass $allTags and categories to the view
    }

    public function edit()
    {

        $user = auth()->user();


        $venue = Venue::with('tags')->where('user_id', $user->id)->first();


        if (!$venue) {
            return redirect()->back()->withErrors(['error' => 'Venue not found for this user.']);
        }


        $allTags = Tag::all();


        $attachedTags = $venue->tags->pluck('tag_id')->toArray();


        return view('venue.update', compact('venue', 'allTags', 'attachedTags'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(VenueAuthentication $request)
    {

        if (Venue::where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'You have already registered a venue.');
        }


        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();


        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('uploads/venues', 'public');
        }

        $venue = Venue::create($validatedData);


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/venues', 'public');
                VenueImage::create([
                    'venue_id' => $venue->venue_id,
                    'image' => $path,
                ]);
            }
        }


        if ($request->has('tags') && $request->tags[0] !== null) {

            $tags = array_map('intval', explode(',', trim($request->tags[0], '[]')));


            $venue->tags()->attach($tags);
        }

        return redirect()->route('venue.details')->with('message', 'Your venue details have been submitted. Please wait for admin approval.');
    }


    public function showVenueDetails()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Fetch the venue associated with the authenticated user
        $venue = Venue::with(['images', 'tags', 'activities', 'bookings'])
            ->where('user_id', $user->id) // Filter by the current user's ID
            ->first();

        if (!$venue) {
            return redirect()->back()->withErrors(['error' => 'Venue not found for this user.']);
        }

        // Calculate total activities and total booking price
        $totalBookingsConfirmed = $venue->bookings()->where('status', 'Confirmed')->count();


        // Calculate the total price for confirmed bookings
        $totalBookingPrice = $venue->bookings()
            ->where('status', 'Confirmed') // Only confirmed bookings
            ->join('activities', 'bookings.activity_id', '=', 'activities.activity_id')
            ->sum('activities.price');  // Sum up the prices from the activities


        $totalBookings = $venue->bookings()->count(); // Count total bookings
        // Pass data to the view
        return view('venue.details', compact('venue', 'totalBookingsConfirmed', 'totalBookingPrice', 'totalBookings'));
    }

    public function showActivitiesPage()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Fetch the venue associated with the authenticated user
        $venue = Venue::with('activities') // Only eager load activities
            ->where('user_id', $user->id) // Filter by the current user's ID
            ->first();

        if (!$venue) {
            return redirect()->back()->withErrors(['error' => 'Venue not found for this user.']);
        }


        // Pass data to the view
        return view('venue.activities.show', compact('venue'));
    }

    public function createActivity()
    {
        // Get the categories for the activity
        $categories = Category::all();

        // Return the view with categories
        return view('venue.activities.create', compact('categories'));
    }

    public function storeActivity(ActivityValidation $request)
    {
        // Validate and store the activity data
        $validatedData = $request->validated();

        // Add the authenticated user's venue ID to the validated data
        $validatedData['venue_id'] = auth()->user()->venue->venue_id;

        // Create the new activity
        Activity::create($validatedData);

        // Redirect back with a success message
        return redirect()->route('venue.activities')->with('success', 'Your Activity has been created successfully!');
    }

    public function editActivity($id)
    {
        $activity = Activity::findOrFail($id);

        // Check if the authenticated user owns the activity
        if ($activity->venue->user_id !== auth()->id()) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized access.']);
        }

        $categories = Category::all();

        return view('venue.activities.update', compact('activity', 'categories'));
    }

    public function updateActivity(ActivityValidation $request, $id)
    {

        $activity = Activity::findOrFail($id);


        if ($activity->venue->user_id !== auth()->id()) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized access.']);
        }


        $validatedData = $request->validated();

        $validatedData['venue_id'] = $activity->venue->venue_id;

        $activity->update($validatedData);

        return redirect()->route('venue.activities')->with('success', 'Your Activity has been updated successfully!');
    }

    public function destroyActivity($id)
    {
        $activity = Activity::findOrFail($id);

        // Check if the authenticated user owns the activity
        if ($activity->venue->user_id !== auth()->id()) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized access.']);
        }


        $activity->bookings()->delete();

        $activity->delete();

        return redirect()->back()->with('success', 'Your Activity has been Deleted successfully!');
    }



    public function update(VenueValidation $request)
    {


        $user = auth()->user();


        $venue = Venue::where('user_id', $user->id)->first();
        // dd($request->merge(['id' => $venue->venue_id]));


        if (!$venue) {
            return redirect()->back()->withErrors(['error' => 'Venue not found for this user.']);
        }

        $validatedData = $request->validated();


        if ($request->hasFile('image')) {

            if ($venue->image) {
                Storage::disk('public')->delete($venue->image);
            }


            $validatedData['image'] = $request->file('image')->store('uploads/venues', 'public');
        }


        $venue->update($validatedData);


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/venues', 'public');
                VenueImage::create([
                    'venue_id' => $venue->venue_id,
                    'image' => $path,
                ]);
            }
        }


        if ($request->has('tags') && $request->tags[0] !== null) {
            $tags = array_map('intval', explode(',', trim($request->tags[0], '[]')));


            $venue->tags()->sync($tags);
        }

        return redirect()->route('venue.details')->with('success', 'Your venue details have been updated.');
    }


    public function showVenueProfile($id)
    {

        $user = User::find($id);


        if (!$user) {
            return redirect()->route('venue.details');
        }


        if ($user->user_type !== 'venue') {
            abort(403, 'Unauthorized action.');
        }


        if (auth()->user()->id !== $user->id) {
            abort(403, 'You are not authorized to view this profile.');
        }

        return view('venue.profile', compact('user'));
    }

    public function bookings()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Fetch the venue associated with the authenticated user, eager load activities and bookings
        $venue = Venue::with(['activities.bookings' => function ($query) {
            $query->orderBy('updated_at', 'asc'); // Sort bookings from oldest to newest
        }])
            ->where('user_id', $user->id) // Filter by the current user's ID
            ->first();

        if (!$venue) {
            return redirect()->back()->withErrors(['error' => 'Venue not found for this user.']);
        }


        // Pass data to the view
        return view('venue.booking', compact('venue'));
    }


    public function updateBookingStatus(Request $request, $bookingId)
    {
        // Validate the status input
        $request->validate([
            'status' => 'required|in:Confirmed,Decline',
        ]);

        // Find the booking by ID
        $booking = Booking::findOrFail($bookingId);

        // Update the booking status
        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }
}
