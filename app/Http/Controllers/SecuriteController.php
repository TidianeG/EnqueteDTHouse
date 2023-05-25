<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecuriteController extends Controller
{
    public function get_securite()
    {
        return view('users.securite');
    }
}
