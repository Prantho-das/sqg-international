<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNot('email','masud@diu.ac')->paginate();

        return view('users.index', compact('users'));
    }
}
