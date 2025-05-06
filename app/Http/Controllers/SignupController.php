<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash; // Import the Hash facade for password hashing
use Illuminate\Support\Facades\Validator; // Import Validator for request validation

class SignupController extends Controller
{
    public function signupPost(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // Make sure to have a confirmation field
            'business_name' => 'required|string|max:255',
            'contact_num' => 'required|string|max:15', // Adjust as needed
            'business_num' => 'required|string|max:15', // Adjust as needed
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user account
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash the password
            'business_name' => $request->business_name,
            'contact_num' => $request->phone_number,
            'business_pan' => $request->pan_num,
        ]);

        // Flash a success message to the session
        session()->flash('success', 'User account created successfully!');

        // Redirect to the login page
        return redirect()->route('login');
    }
}
