<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Get users with roles
        $users = User::with('roles')->paginate(10);
    
        // Extract only the 'name' field from each user-role relationship
        $userNames = $users->map(function($user) {
            return $user->roles->pluck('name'); // Plucking the 'name' field from the roles
        });
    
        // Pass only the names to the view
        return view('filament.pages.account', compact('userNames', 'users'));
    }
    
}