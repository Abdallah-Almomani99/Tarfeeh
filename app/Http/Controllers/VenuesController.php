<?php

namespace App\Http\Controllers;

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
        $data = Venue::all();
        return view('admin.venues.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allTags = Tag::all(); // Fetch all tags from the Tag model
        return view('admin.venues.create', compact('allTags')); // Pass $allTags to the view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VenueAuthentication $request)
    {



        $validatedData = $request->validated();


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


        $validatedData = $request->validated();
        $venue = Venue::findOrFail($id);
        $venue->update($validatedData);


        // Check if new images are provided
        if ($request->hasFile('images')) {
            // Delete old images from the database and filesystem
            foreach ($venue->images as $image) {
                // Delete the file from the storage

                if (Storage::disk('public')->exists($image->image)) {
                    Storage::disk('public')->delete($image->image);
                }

                // Delete the record from the database
                $image->delete();
            }

            // Save the new images
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/venues', 'public');

                VenueImage::create([
                    'venue_id' => $venue->venue_id,
                    'image' => $path,
                ]);
            }
        }

        // Update tags
        if ($request->has('tags') && $request->tags[0] !== null) {
            // Convert tags from a string to an array of integers
            $tags = array_map('intval', explode(',', trim($request->tags[0], '[]')));

            // Sync the tags (remove old and attach new)
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
