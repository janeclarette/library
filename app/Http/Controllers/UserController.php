<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showDashboard()
    {
        $users = User::all(); // Retrieve all users from the database
        return view('admin.dashboard', compact('users'));
    }
    
    public function dashboard()
    {
        $users = User::all(); // Fetch all users (you may need to adjust this query)

        return view('users.dashboard', compact('users'));
    }

    public function activate(User $user)
    {
        // Update the user's active status
        $user->update(['is_active' => true]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'User activated successfully.');
    }
    
    public function deactivate(User $user)
    {
        // Update the user's active status
        $user->update(['is_active' => false]);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'User deactivated successfully.');
    }
    
}
