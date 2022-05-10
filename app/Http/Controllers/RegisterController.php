<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('authorization.register');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // 'username' => ['required', 'min:3', 'max:3', 'unique:users'],
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
            'confirm_password' => 'required|min:5|max:255',
        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['confirm_password'] = Hash::make($validatedData['confirm_password']);
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successfully! Please login');

    }
}
