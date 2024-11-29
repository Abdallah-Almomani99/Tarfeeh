<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\ActivityAuthentication;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Activity::all();
        return view('admin.activities.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $venues = Venue::all();
        return view('admin.activities.create', compact('venues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivityAuthentication $request)
    {
        $validatedData = $request->validated();
        Activity::create($validatedData);
        return redirect('/admin/activities')->with('success', 'Activity Added Successfully!');
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
        $data = Activity::findOrFail($id);
        return view('admin.activities.update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActivityAuthentication $request, string $id)
    {
        $validatedData = $request->validated();
        $activity = Activity::findOrFail($id);
        $activity->update($validatedData);
        return redirect('/admin/activities')->with('success', 'Activity Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect('/admin/activities')->with('success', 'Activity Deleted Successfully!');
    }
}
