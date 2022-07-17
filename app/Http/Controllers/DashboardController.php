<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Patient;
use App\Models\TrainingPath;
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
            $patients = Patient::with(['trainingPaths' => function ($query) {
                $query->where('type', "ARUS");
            }])->whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
            $patient_id = [];
            foreach ($patients as $patient) {
                array_push($patient_id, $patient->id);
            }
            $fileName = TrainingPath::whereIn('patient_id', $patient_id)->where('type', 'ARUS')->get();
        }
        if ($user->role == 'Admin') {
            $patients = Patient::with(['trainingPaths' => function ($query) {
                $query->where('type', "ARUS");
            }])->get();
            $patient_id = [];
            foreach ($patients as $patient) {
                array_push($patient_id, $patient->id);
            }
            $fileName = TrainingPath::whereIn('patient_id', $patient_id)->where('type', 'ARUS')->get();
        }
        if ($user->role == 'Patient') {
            $fileName = TrainingPath::where('patient_id', $user->patient->id)->where('type', 'ARUS')->get();
        }
        return view('user.current', ["patients" => $patients, 'user' => $user, 'fileName' => $fileName]);
    }

    public function trajectory()
    {
        $patients = [];
        $user = auth()->user();
        if ($user->role == 'Doctor') {
            $patients = Patient::with(['trainingPaths' => function ($query) {
                $query->where('type', "TRAYEKTORI");
            }])->whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
            $patient_id = [];
            foreach ($patients as $patient) {
                array_push($patient_id, $patient->id);
            }
            $fileName = TrainingPath::whereIn('patient_id', $patient_id)->where('type', 'TRAYEKTORI')->get();
        }
        if ($user->role == 'Admin') {
            $patients = Patient::with(['trainingPaths' => function ($query) {
                $query->where('type', "TRAYEKTORI");
            }])->get();
            $patient_id = [];
            foreach ($patients as $patient) {
                array_push($patient_id, $patient->id);
            }
            $fileName = TrainingPath::whereIn('patient_id', $patient_id)->where('type', 'TRAYEKTORI')->get();
        }
        if ($user->role == 'Patient') {
            $fileName = TrainingPath::where('patient_id', $user->patient->id)->where('type', 'TRAYEKTORI')->get();
        }
        return view('user.trajectory', ["patients" => $patients, 'user' => $user, 'fileName' => $fileName]);
    }

    public function velocity()
    {
        $patients = [];
        $user = auth()->user();
        if ($user->role == 'Doctor') {
            $patients = Patient::with(['trainingPaths' => function ($query) {
                $query->where('type', "KECEPATAN");
            }])->whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
            $patient_id = [];
            foreach ($patients as $patient) {
                array_push($patient_id, $patient->id);
            }
            $fileName = TrainingPath::whereIn('patient_id', $patient_id)->where('type', 'KECEPATAN')->get();
        }
        if ($user->role == 'Admin') {
            $patients = Patient::with(['trainingPaths' => function ($query) {
                $query->where('type', "KECEPATAN");
            }])->get();
            $patient_id = [];
            foreach ($patients as $patient) {
                array_push($patient_id, $patient->id);
            }
            $fileName = TrainingPath::whereIn('patient_id', $patient_id)->where('type', 'KECEPATAN')->get();
        }
        if ($user->role == 'Patient') {
            $fileName = TrainingPath::where('patient_id', $user->patient->id)->where('type', 'KECEPATAN')->get();
        }
        return view('user.velocity', ["patients" => $patients, 'user' => $user, 'fileName' => $fileName]);
    }

    public function torque()
    {
        $patients = [];
        $user = auth()->user();
        if ($user->role == 'Doctor') {
            $patients = Patient::with(['trainingPaths' => function ($query) {
                $query->where('type', "TORQUE");
            }])->whereHas('doctors', function (Builder $query) {
                $query->where('doctor_id', auth()->user()->doctor->id);
            })->get();
            $patient_id = [];
            foreach ($patients as $patient) {
                array_push($patient_id, $patient->id);
            }
            $fileName = TrainingPath::whereIn('patient_id', $patient_id)->where('type', 'TORQUE')->get();
        }
        if ($user->role == 'Admin') {
            $patients = Patient::with(['trainingPaths' => function ($query) {
                $query->where('type', "TORQUE");
            }])->get();
            $patient_id = [];
            foreach ($patients as $patient) {
                array_push($patient_id, $patient->id);
            }
            $fileName = TrainingPath::whereIn('patient_id', $patient_id)->where('type', 'TORQUE')->get();
        }
        if ($user->role == 'Patient') {
            $fileName = TrainingPath::where('patient_id', $user->patient->id)->where('type', 'TORQUE')->get();
        }
        return view('user.torque', ["patients" => $patients, 'user' => $user, 'fileName' => $fileName]);
    }
}
