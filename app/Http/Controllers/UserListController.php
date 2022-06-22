<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Account;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserListController extends Controller
{
    public function showUserList()
    {
        $user = auth()->user();
        $account = Account::paginate(10);
        return view('user.user_list', [
            'accounts' => $account,
            'user' => $user
        ]);
    }

    public function getDataAdmin(Account $account, $uuid)
    {
        $user = auth()->user();
        $account = Account::where('uuid', $uuid)->first();
        return view('user_list.get_admin', [
            'account' => $account,
            'admin' => $account->admin,
            'user' => $user
        ]);
    }

    public function getDataDoctor(Account $account, $uuid)
    {
        $user = auth()->user();
        $account = Account::where('uuid', $uuid)->first();
        return view('user_list.get_doctor', [
            'account' => $account,
            'doctor' => $account->doctor,
            'user' => $user
        ]);
    }

    public function getDataPatient(Account $account)
    {
        $user = auth()->user();
        $account = Account::where('uuid', $uuid)->first();
        return view('user_list.get_patient', [
            'account' => $account,
            'patient' => $account->patient,
            'user' => $user
        ]);
    }

    public function getDataPatientApi(Account $account)
    {
        $data = Patient::with('account')->get();
        return response()->json([
            'data' => $data,
        ]);
    }

    public function formEditAdmin($uuid)
    {
        $user = auth()->user();
        $account = Account::where('uuid', $uuid)->first();
        return view('user_list.edit_admin', [
            'account' => $account,
            'admin' => $account->admin,
            'user' => $user
        ]);
    }

    public function formEditDoctor($uuid)
    {
        $user = auth()->user();
        $account = Account::where('uuid', $uuid)->first();
        // $account = Account::where('uuid', auth()->user()->uuid)->first();
        return view('user_list.edit_doctor', [
            'account' => $account,
            'doctor' => $account->doctor,
            'user' => $user
        ]);
    }

    public function formEditPatient($uuid)
    {
        $user = auth()->user();
        $account = Account::where('uuid', $uuid)->first();
        return view('user_list.edit_patient', [
            'account' => $account,
            'patient' => $account->patient,
            'user' => $user
        ]);
    }

    public function editDataAdmin(Request $request, $uuid)
    {
        $account = Account::where('uuid', $uuid)->first();
        $admin  = Admin::where('account_id', $account->id)->first();

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
        return redirect("/user-list/admin/$account->uuid")->with('success', 'Update Profile Success!');;
    }

    public function editDataDoctor(Request $request, $uuid)
    {
        $account = Account::where('uuid', $uuid)->first();
        $doctor  = Doctor::where('account_id', $account->id)->first();

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
        return redirect("/user-list/doctor/$account->uuid")->with('success', 'Update Profile Success!');;
    }

    public function editDataPatient(Request $request, $uuid)
    {
        $account = Account::where('uuid', $uuid)->first();
        $patient = Patient::where('account_id', $account->id)->first();
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
        return redirect("/user-list/patient/$account->uuid")->with('success', 'Update Profile Success!');;
    }

    public function deleteDataAdmin($uuid)
    {
        $account = Account::where('uuid', $uuid)->first();
        $admin = Admin::where('account_id', $account->id)->first();
        $admin->delete();
        $account->delete();

        return redirect('/user-list')->with('success', 'Success Delete Account');
    }

    public function deleteDataDoctor($uuid)
    {
        $account = Account::where('uuid', $uuid)->first();
        $doctor = Doctor::where('account_id', $account->id)->first();
        $doctor->patients()->detach();
        $doctor->delete();
        $account->delete();

        return redirect('/user-list')->with('success', 'Success Delete Account');
    }

    public function deleteDataPatient($uuid)
    {
        $account = Account::where('uuid', $uuid)->first();
        $patient = Patient::where('account_id', $account->id)->first();
        $patient->doctors()->detach();
        $patient->delete();
        $account->delete();

        return redirect('/user-list')->with('success', 'Success Delete Account');
    }
}
