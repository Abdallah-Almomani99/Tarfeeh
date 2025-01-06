<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Models\Activity;
use App\Models\Category;
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
        $categories = Category::all();
        return view('admin.activities.create', compact('venues', 'categories'));
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
        $activity = Activity::findOrFail($id);
        return view('admin.activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activity = Activity::findOrFail($id);
        $venues = Venue::all();
        $categories = Category::all();
        return view('admin.activities.update', compact('activity', 'venues', 'categories'));
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
