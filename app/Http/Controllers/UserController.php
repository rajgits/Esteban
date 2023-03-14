<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Shows the register page
    public function register()
    {
        $data['title'] = 'Register';
        return view('user/register', $data);
    }

    // Processes the registration form submission
    public function register_action(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        // Create a new user and save to database
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }

    // Shows the login page
    public function login()
    {
        $data['title'] = 'Login';
        return view('user/login', $data);
    }

    // Processes the login form submission
    public function login_action(Request $request)
    {
        // Validate the form data
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Attempt to authenticate user
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // If authentication fails, redirect back with error message
        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    // Shows the change password page
    public function password()
    {
        $data['title'] = 'Change Password';
        return view('user/password', $data);
    }

    // Processes the change password form submission
    public function password_action(Request $request)
    {
        // Validate the form data
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);

        // Find the current user and update their password
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();

        // Redirect back with success message
        return back()->with('success', 'Password changed!');
    }

    // Logs out the user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}



