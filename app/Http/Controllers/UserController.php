<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserAuthentication;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view('admin.users.index', compact('data'));
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

        // Toggle the 'status' column between 'active' and 'inactive'
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        // Redirect back with a success message
        return redirect()->route('users.index')->with('success', 'User status updated successfully.');
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
