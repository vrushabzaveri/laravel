<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{

    public function index()
    {
        // Fetch user data from the database
        $users = User::all(); // Retrieve all users

        // Pass the user data and the logged-in user's name to the view
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
            'username' => 'required|unique:users',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'required',
        ]);



        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'image' => $request->file('image'),
            'active' => $request->input('active'),
        ]);

        // Handle FILE UPLOAD
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();

            // Create folder if it doesn't exist
            $folderPath = public_path('images/users/images' . '/' . $user->id);

            // Move the uploaded image to the folder
            $image->move($folderPath, $imageName);
            $user->image = $imageName;
        }

        $user->save();

        // Redirect back to the user list or display a success message
        return redirect()->route('users.index');
    }

    // Display the Username whoever is logged in 



    public function showLoginForm()
    {
        return view('users.login');
    }

    public function edit($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Pass the user data to the view
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'required',
            'active' => 'required|boolean',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);


        $imageName = $user->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folderPath = public_path('images/users/images/' . $user->id);

            // Move the uploaded image to the folder
            $imageName = $image->getClientOriginalName();
            $image->move($folderPath, $imageName);
        }
        // Update the user data
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'active' => $request->input('active'),
            'image' => $imageName,
        ]);

        return redirect()->route('users.index');
    }



    public function show($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Pass the user data to the view
        return view('users.show', compact('user'));
    }


    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication
            // Fetch users
            $users = User::all();
            // Pass users to the view
            return view('users.index', compact('users'));
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
