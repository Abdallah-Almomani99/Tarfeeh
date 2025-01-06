<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::orderByRaw("FIELD(status, 'Pending', 'Working', 'Resolved')") // Order with Resolved last
            ->get();

        return view('admin.contacts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:Pending,Resolved,Working',  // Include Working as a valid status
        ]);

        // Find the contact message by ID
        $message = Contact::findOrFail($id);

        // Update the status
        $message->status = $request->status;
        $message->save();

        // Redirect back with a success message
        return redirect()->route('contacts.index')->with('success', 'Status updated successfully');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the contact message by ID
        $message = Contact::findOrFail($id);

        // Return a view with the message details
        return view('admin.contacts.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
