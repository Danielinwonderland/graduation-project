<?php

namespace App\Http\Controllers\Cms;
use App\Http\Controllers\Controller;
use App\Models\Tasks;
use App\Models\User;
use DateTime;

class DashbordController extends Controller
{
    public function index(){

        $users = User::orderBy('rate', 'DESC')
        ->limit(5)
        ->get();

        $date = new DateTime('NOW');
        $lastDay = $date->modify('-1 day');
        $lastDay = $lastDay->format('Y-m-d H:i:s');

        $tasksCount = Tasks::where('created_at', '>', $lastDay)
        ->count('id');

        $usersCount = User::where('created_at', '>', $lastDay)
        ->count('id');

        return view('cms.dashbord')
        ->with('tasksCount', $tasksCount)
        ->with('usersCount', $usersCount)
        ->with('users', $users);
    }
}
