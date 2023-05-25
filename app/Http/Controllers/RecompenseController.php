<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecompenseController extends Controller
{
    public function get_recompenses()
    {
        return view('users.recompenses');
    }
}
