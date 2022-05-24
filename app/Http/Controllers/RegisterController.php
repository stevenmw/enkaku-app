<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Account;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('authorization.register');
    }

    public function storePatient(Request $request)
    {
        $validatedAccount = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
            'confirm_password' => 'required|min:5|max:255',
        ]);
        $validatedAccount['password'] = Hash::make($validatedAccount['password']);
        $validatedAccount['confirm_password'] = Hash::make($validatedAccount['confirm_password']);
        Account::create($validatedAccount);

        $validatePatient = $request->validate([
            'account_id' => 'required'
        ]);
        Patient::create($validatePatient);
        return redirect('/login')->with('success', 'Registration successfully! Please login');
    }

    public function storeAdmin(Request $request)
    {
        $validatedAccount = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
            'confirm_password' => 'required|min:5|max:255',
        ]);
        $validatedAccount['password'] = Hash::make($validatedAccount['password']);
        $validatedAccount['confirm_password'] = Hash::make($validatedAccount['confirm_password']);
        Account::create($validatedAccount);

        $validateAdmin = $request->validate([
            'account_id' => 'required'
        ]);
        Admin::create($validateAdmin);
        return redirect('/login')->with('success', 'Registration successfully! Please login');
    }

    public function storeDoctor(Request $request)
    {
        $validatedAccount = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
            'confirm_password' => 'required|min:5|max:255',
        ]);
        $validatedAccount['password'] = Hash::make($validatedAccount['password']);
        $validatedAccount['confirm_password'] = Hash::make($validatedAccount['confirm_password']);
        Account::create($validatedAccount);

        $validateDoctor = $request->validate([
            'account_id' => 'required'
        ]);
        Doctor::create($validateDoctor);
        return redirect('/login')->with('success', 'Registration successfully! Please login');
    }
}
