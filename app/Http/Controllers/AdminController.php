<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function dashbord_admin()
    {
        return view('admin.dashbord');
    }
}
