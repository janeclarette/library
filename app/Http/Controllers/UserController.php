<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showDashboard()
    {
        $users = User::all(); 
        return view('admin.dashboard', compact('users'));
    }
    
    public function dashboard()
    {
        $users = User::all(); 

        return view('users.dashboard', compact('users'));
    }

    public function activate(User $user)
    {

        $user->update(['is_active' => true]);

        return redirect()->back()->with('success', 'User activated successfully.');
    }
    
    public function deactivate(User $user)
    {

        $user->update(['is_active' => false]);
    
        return redirect()->back()->with('success', 'User deactivated successfully.');
    }
    
}
