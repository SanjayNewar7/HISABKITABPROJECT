<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade for login functionality
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ensure the User model is imported


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Check if the user exists and the password is correct
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to the dashboard
            return redirect()->route('viewtable'); // Adjust this to your dashboard route
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
    /**
     * Display the specified resource.
     */
    public function showDashboard()
    {
        //
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
    public function showLoginForm() {
        return view('login'); // Return the login view
    }


    public function signUp(){
        return view('signup');
    }
    public function signUpPost(Request $request) {
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->business_name = $request->business_name;
        $user->contact_num = $request->phone_number;
        $user->business_pan = $request->pan_num;
        $user->save();

        // Flash a success message to the session
        session()->flash('success', 'User account created successfully!');

        // Redirect to the login page
        return redirect(route('login'));
    }

}
