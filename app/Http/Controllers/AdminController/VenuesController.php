<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Venue;
use App\Models\VenueImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\VenueAuthentication;

class VenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Venue::with('user')->get();
        return view('admin.venues.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $allTags = Tag::all();
        return view('admin.venues.create', compact('allTags')); // Pass $allTags and categories to the view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VenueAuthentication $request)
    {



        $validatedData = $request->validated();
        $validatedData['user_id'] = '0';
        $validatedData['status'] = 'active';

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


        // Attach tags if provided
        if ($request->has('tags') && $request->tags[0] !== null) {
            // Convert the tags from a string to an array of integers
            $tags = array_map('intval', explode(',', trim($request->tags[0], '[]')));

            // Attach the tags to the venue
            $venue->tags()->attach($tags);
        }

        return redirect('/admin/venues')->with('success', 'Venue added successfully!');
    }


    public function toggleStatus(Request $request, $id)
    {
        $venue = Venue::findOrFail($id);

        // Toggle the 'status' column between 'active' and 'inactive'
        $venue->status = $venue->status === 'active' ? 'inactive' : 'active';
        $venue->save();

        // Redirect back with a success message
        return redirect()->route('venues.index')->with('success', 'Venue status updated successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $venue = Venue::with('images')->findOrFail($id);
        return view('admin.venues.show', compact('venue'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $allTags = Tag::all(); // Fetch all tags
        $data = Venue::with('tags')->findOrFail($id);
        $attachedTags = $data->tags->pluck('tag_id')->toArray();
        return view('admin.venues.update', compact('data', 'allTags', 'attachedTags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VenueAuthentication $request, string $id)
    {
        // Validate incoming data
        $validatedData = $request->validated();

        // Find the venue or fail
        $venue = Venue::findOrFail($id);

        // Update the venue's basic fields
        $venue->update($validatedData);

        // Handle the main image update
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if ($venue->image && Storage::disk('public')->exists($venue->image)) {
                Storage::disk('public')->delete($venue->image);
            }

            // Save the new image
            $validatedData['image'] = $request->file('image')->store('uploads/venues', 'public');
            $venue->update(['image' => $validatedData['image']]);
        }

        // Handle additional images
        if ($request->hasFile('images')) {
            // Delete old additional images
            foreach ($venue->images as $image) {
                if (Storage::disk('public')->exists($image->image)) {
                    Storage::disk('public')->delete($image->image);
                }
                $image->delete();
            }

            // Store and link new images
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/venues', 'public');
                VenueImage::create([
                    'venue_id' => $venue->venue_id,
                    'image' => $path,
                ]);
            }
        }

        // Handle tag synchronization
        if ($request->has('tags') && $request->tags[0] !== null) {
            $tags = array_map('intval', explode(',', trim($request->tags[0], '[]')));
            $venue->tags()->sync($tags);
        }

        return redirect('/admin/venues')->with('success', 'Venue Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venue = Venue::findOrFail($id);
        $venue->delete();
        return redirect('/admin/venues')->with('success', 'Venue Deleted Successfully!');
    }
}
