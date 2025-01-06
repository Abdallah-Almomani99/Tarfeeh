<?php

namespace App\Http\Controllers\AdminController;

use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAuthentication;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('user_type', 'user')->get();

        return view('admin.users.index', compact('data'));
    }

    public function admins()
    {
        $data = User::where('user_type', 'admin')->get();

        return view('admin.users.admin', compact('data'));
    }

    public function venues()
    {
        $data = User::where('user_type', 'venue')->get();

        return view('admin.users.venue', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserAuthentication $request)
    {
        $validatedData = $request->validated();

        $validatedData['user_type'] = 'admin';

        User::create($validatedData);
        return redirect('/admin/users')->with('success', 'User Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::findOrFail($id);
        return view('admin.users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function user()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(UserAuthentication $request, string $id)
    {
        // $validatedData = $request->validated();
        // $user = User::findOrFail($id);
        // $user->update($validatedData);
        // return redirect('/admin/users')->with('success', 'User Updated Successfully!');
    }


    public function toggleStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Toggle the user's 'status' column
        $newStatus = $user->status === 'active' ? 'inactive' : 'active';
        $user->status = $newStatus;
        $user->save();

        // If the user is set to 'inactive', set their venues to 'inactive' as well
        if ($newStatus === 'inactive') {
            Venue::where('user_id', $id)->update(['status' => 'inactive']);
        }

        // Redirect back with a success message
        return redirect()->route('users.index')->with('success', 'User and associated venues status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/users')->with('success', 'User Deleted Successfully!');
    }
}
