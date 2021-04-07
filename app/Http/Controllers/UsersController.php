<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    public function executors(){
        $users = User::all();
        return view('users.executors')->with('users', $users);
    }

    public function customers(){
        $users = User::all();
        return view('users.customers')->with('users', $users);
    }
}
