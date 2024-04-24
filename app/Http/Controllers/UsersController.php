<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function index()
    {
        // Fetch user data from the database
        $users = User::all(); // Retrieve all users

        // Pass the user data to the view
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'required',
        ]);
        
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'active' => $request->input('active'),
        ]);
        
        // HANDLE FILE UPLOAD 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folder = 'images/users/image' . $user->id; 
        
            // Move the image to the specified folder
            $image->move(public_path($folder), $image->getClientOriginalName());
            
            // Update the user's image file name in the database
            $user->image = $image->getClientOriginalName();
        }
        
        $user->save();
        
        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'User created successfully.');
    }        

    public function show(string $id)
    {
        // Retrieve the user from the database by its ID
        $user = User::findOrFail($id);

        // Pass the user data to the view
        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
    // Retrieve the user from the database
    $user = User::findOrFail($id);

    // Pass the user data to the edit view
    return view('users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add validation rules for other fields (email, username, etc.)
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user's data
        $user->update($validatedData);

        // Redirect back to the user list or display a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(string $id)
    {
        //
    }

    
}
