<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function helpcenter()
    {
        return view('user.helpcenter');
    }

    public function current()
    {
        return view('user.current');
    }

    public function trajectory()
    {
        return view('user.trajectory');
    }

    public function velocity()
    {
        return view('user.velocity');
    }
}
