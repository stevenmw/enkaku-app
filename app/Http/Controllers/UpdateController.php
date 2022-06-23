<?php

namespace App\Http\Controllers;

use Error;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Account;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function formUpdatePatient()
    {
        $user = auth()->user();
        if (!$user->role == 'Patient') {
            return redirect('/dashboard')->with('error', 'You have no access to this page');
        }

        $account = Account::where('id', auth()->user()->id)->first();
        // $account = Account::all();
        // $patient = Patient::where('account_id', auth()->user()->id)->first();
        return view('edit_profile.patient', [
            'account' => $account,
            'patient' => $account->patient,
            'user'    => $user
        ]);
    }

    public function formUpdateDoctor()
    {
        $user = auth()->user();
        if (!$user->role == 'Doctor') {
            return redirect('/dashboard')->with('error', 'You have no access to this page');
        }
        $account = Account::where('id', auth()->user()->id)->first();
        // $doctor = Doctor::where('account_id', auth()->user()->id)->first();

        return view('edit_profile.doctor', [
            'account' => $account,
            'doctor'  => $account->doctor,
            'user'    => $user
        ]);
    }

    public function formUpdateAdmin()
    {
        $user = auth()->user();
        if (!$user->role == 'Admin') {
            return redirect('/dashboard')->with('error', 'You have no access to this page');
        }
        $account = Account::where('id', auth()->user()->id)->first();
        return view('edit_profile.admin', [
            'account' => $account,
            'admin' => $account->admin,
            'user'    => $user
        ]);
    }

    public function updatePatient(Request $request, $id)
    {
        $account = Account::find($id);
        $patient = Patient::where('account_id', $id)->first();
        // cara 1
        // $account->update($request->all);
        //cara 2
        $account->name = $request->name;
        $account->address = $request->address;
        $account->date_birth = $request->dateofbirth;
        $account->gender = $request->gender;
        $account->email = $request->email;
        // $account->password = Hash::make($request->password);
        // $account->confirm_password = Hash::make($request->confirm_password);
        $patient->contact_number = $request->contact_number;
        $patient->weight = $request->weight;
        $patient->height = $request->height;
        $patient->disease_and_condition = $request->condition;

        $account->save();
        $patient->save();
        return redirect('/update-patient')->with('success', 'Update Profile Success!');;
    }

    public function updateDoctor(Request $request, $id)
    {
        $account = Account::find($id);
        $doctor  = Doctor::where('account_id', $id)->first();

        $account->name = $request->name;
        $account->address = $request->address;
        $account->date_birth = $request->dateofbirth;
        $account->gender = $request->gender;
        $account->email = $request->email;
        // $account->password = Hash::make($request->password);
        // $account->confirm_password = Hash::make($request->confirm_password);
        $doctor->start_hour = $request->start_hour;
        $doctor->end_hour = $request->end_hour;
        $doctor->specialist = $request->specialist;

        $account->save();
        $doctor->save();
        return redirect('/update-doctor')->with('success', 'Update Profile Success!');;
    }

    public function updateAdmin(Request $request, $id)
    {
        $account = Account::find($id);
        $admin  = Admin::where('account_id', $id)->first();

        $account->name = $request->name;
        $account->address = $request->address;
        $account->date_birth = $request->dateofbirth;
        $account->gender = $request->gender;
        $account->email = $request->email;
        // $account->password = Hash::make($request->password);
        // $account->confirm_password = Hash::make($request->confirm_password);
        $admin->start_hour = $request->start_hour;
        $admin->end_hour = $request->end_hour;

        $account->save();
        $admin->save();
        return redirect('/update-admin')->with('success', 'Update Profile Success!');;
    }
}
