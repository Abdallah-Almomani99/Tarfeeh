<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagAuthentication;

class TagController extends Controller
{
    public function index()
    {
        $data = Tag::all();
        return view('admin.tags.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagAuthentication $request)
    {
        // The request is already validated at this point
        $validatedData = $request->validated();

        // Create the tag in the database
        Tag::create($validatedData);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
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
        $tag = Tag::findOrFail($id);
        return view('admin.tags.update', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagAuthentication $request, string $id)
    {
        $validatedData = $request->validated();
        $tag = Tag::findOrFail($id);
        $tag->update($validatedData);
        return redirect('/admin/tags')->with('success', 'Tag Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully!');
    }
}
