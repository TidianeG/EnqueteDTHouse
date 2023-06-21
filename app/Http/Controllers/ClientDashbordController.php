<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClientDashbordController extends Controller
{
    public function getClients()
    {
        $users = User::where('roles','=','user')->get();
    
        //dd($clients);
        return view('admin.users',compact('users'));
    }
}
