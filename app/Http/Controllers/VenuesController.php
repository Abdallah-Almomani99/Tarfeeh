<?php

namespace App\Http\Controllers;

use App\Http\Requests\VenueAuthentication;
use App\Models\Venue;
use Illuminate\Http\Request;

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
        return view('admin.venues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VenueAuthentication $request)
    {
        $validatedData = $request->validated();
        Venue::create($validatedData);
        return redirect('/admin/venues')->with('success', 'Venue Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Venue::findOrFail($id);
        return view('admin.venues.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VenueAuthentication $request, string $id)
    {
        $validatedData = $request->validated();
        $venue = Venue::findOrFail($id);
        $venue->update($validatedData);
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
