<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Account;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function index()
    {
        return view('authorization.register');
    }

    public function registerPatient()
    {
        $doctor = Doctor::all();
        return view('authorization.register', ['account' => 'PATIENT', 'doctor' => $doctor]);
    }

    public function registerDoctor()
    {
        if (auth()->user()->isAdmin()) {
            return view('authorization.register', ['account' => 'DOCTOR']);
        }
        return back()->with('error', 'Unauthorized');
    }

    public function registerAdmin()
    {
        if (auth()->user()->isAdmin()) {
            return view('authorization.register', ['account' => 'ADMIN']);
        }
        return back()->with('error', 'Unauthorized');
    }

    public function storePatient(Request $request)
    {
        $validatedAccount = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
            'confirm_password' => 'required|min:5|max:255',
            'doctor' => 'required|integer',
        ]);
        // dd($request->all());
        $validatedAccount['password'] = Hash::make($validatedAccount['password']);
        $validatedAccount['confirm_password'] = Hash::make($validatedAccount['confirm_password']);
        $validatedAccount['role'] = 'Patient';
        $validatedAccount['uuid'] = Str::uuid();
        $account = Account::create($validatedAccount);

        $patient = Patient::create(['account_id' => $account->id]);

        //add data into patient_doctors table
        $patient->doctors()->attach($request->doctor);

        return redirect('/login')->with('success', 'Doctor registration is success! Please login');
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
        $validatedAccount['role'] = 'Admin';
        $validatedAccount['uuid'] = Str::uuid();
        $account = Account::create($validatedAccount);

        Admin::create(['account_id' => $account->id]);
        return redirect('/dashboard')->with('success', 'Registration successfully! Please login');
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
        $validatedAccount['role'] = 'Doctor';
        $validatedAccount['uuid'] = Str::uuid();
        $account = Account::create($validatedAccount);

        Doctor::create(['account_id' => $account->id]);
        return redirect('/dashboard')->with('success', 'Registration successfully! Please login');
    }
}
