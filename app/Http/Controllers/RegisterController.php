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

    public function registerPatient(){
        return view('authorization.register',['account' => 'PATIENT']);
    }

    public function registerDoctor(){
        return view('authorization.register',['account' => 'DOCTOR']);
    }

    public function registerAdmin(){
        return view('authorization.register',['account' => 'ADMIN']);
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
        $account = Account::create($validatedAccount);

        Patient::create(['account_id' => $account->id]);
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
        $account = Account::create($validatedAccount);

        Admin::create(['account_id' => $account->id]);
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
        $account = Account::create($validatedAccount);

        Doctor::create(['account_id' => $account->id]);
        return redirect('/login')->with('success', 'Registration successfully! Please login');
    }
}
