<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function showUserList(Request $request)
    {
        return view('user.user_list', [
            "active" => 'user.user_list'
        ]);
    }
}
