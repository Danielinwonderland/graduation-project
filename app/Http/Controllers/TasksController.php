<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index(){
        $tasks = Tasks::all();
        return view('tasks.index')->with('tasks', $tasks);
    }
}