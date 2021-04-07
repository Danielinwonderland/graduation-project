<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{
    public function contacts(){
        return view('static.contacts');
    }

    public function about(){
        return view('static.about');
    }
}
