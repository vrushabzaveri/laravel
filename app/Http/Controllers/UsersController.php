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
            'username' => 'required|unique:users',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'active' => 'required',
        ]);

        // Handle FILE UPLOAD
        $image = $request->file('image');
        $folder = 'images/users/image';
        $imageName = $image->getClientOriginalName();
        $image->move(public_path($folder), $imageName);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'image' => $imageName,
            'active' => $request->input('active'),
        ]);

        // Redirect back to the user list or display a success message
        return redirect()->route('users.index');
    }

    public function showLoginForm()
    {
        return view('users.login');
    }
    

    public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
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
