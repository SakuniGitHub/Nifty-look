<?php

namespace App\Http\Controllers;

use App\Models\Admin; // Import the Admin model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 

class AdminController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin',
            'password' => 'required|string|min:8|confirmed', 
        ]);

        
        Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password), 
        ]);

        
        return redirect()->back()->with('success', 'Admin created successfully.');
    }
}
