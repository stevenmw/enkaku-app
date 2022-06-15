<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $patients = [];
        $user = auth()->user();
        if ($user->role == 'Doctor') {
            $patients = Patient::whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
        }
        if ($user->role == 'Admin') {
            $patients = Patient::all();
        }
        return view('user.index', ["patients" => $patients, 'user' => $user]);
    }

    public function guide()
    {
        $user = auth()->user();
        return view('user.guide', ['user' => $user]);
    }

    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', ['user' => $user]);
    }

    public function helpcenter()
    {
        $user = auth()->user();
        return view('user.helpcenter', ['user' => $user]);
    }

    public function terms()
    {
        $user = auth()->user();
        return view('user.terms', ['user' => $user]);
    }

    public function current()
    {
        $patients = [];
        $user = auth()->user();
        if ($user->role == 'Doctor') {
            $patients = Patient::whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
        }
        if ($user->role == 'Admin') {
            $patients = Patient::all();
        }

        return view('user.current', ["patients" => $patients, 'user' => $user]);
    }

    public function trajectory()
    {
        $patients = [];
        $user = auth()->user();
        if ($user->role == 'Doctor') {
            $patients = Patient::whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
        }
        if ($user->role == 'Admin') {
            $patients = Patient::all();
        }

        return view('user.trajectory', ["patients" => $patients, 'user' => $user]);
    }

    public function velocity()
    {
        $patients = [];
        $user = auth()->user();
        if ($user->role == 'Doctor') {
            $patients = Patient::whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
        }
        if ($user->role == 'Admin') {
            $patients = Patient::all();
        }
        return view('user.velocity', ["patients" => $patients, 'user' => $user]);
    }
}
