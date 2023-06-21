<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecuriteController extends Controller
{
    public function get_securite()
    {
        return view('users.securite');
    }

    public function get_securite_admin()
    {
        return view('admin.securite');
    }
}
