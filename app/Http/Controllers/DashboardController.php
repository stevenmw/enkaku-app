<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $patients = [];
        if (auth()->user()->isDoctor()) {
            $patients = Patient::whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
        }
        if (auth()->user()->isAdmin()) {
            $patients = Patient::all();
        }
        return view('user.index', ["patients" => $patients]);
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function helpcenter()
    {
        return view('user.helpcenter');
    }

    public function terms()
    {
        return view('user.terms');
    }

    public function current()
    {
        $patients = [];
        if (auth()->user()->isDoctor()) {
            $patients = Patient::whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
        }
        if (auth()->user()->isAdmin()) {
            $patients = Patient::all();
        }

        return view('user.current', ["patients" => $patients]);
    }

    public function trajectory()
    {
        $patients = [];
        if (auth()->user()->isDoctor()) {
            $patients = Patient::whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
        }
        if (auth()->user()->isAdmin()) {
            $patients = Patient::all();
        }

        return view('user.trajectory', ["patients" => $patients]);
    }

    public function velocity()
    {
        $patients = [];
        if (auth()->user()->isDoctor()) {
            $patients = Patient::whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
        }
        if (auth()->user()->isAdmin()) {
            $patients = Patient::all();
        }
        return view('user.velocity', ["patients" => $patients]);
    }
}
