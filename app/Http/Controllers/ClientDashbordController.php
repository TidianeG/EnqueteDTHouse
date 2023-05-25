<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientDashbordController extends Controller
{
    public function getClients()
    {
        $clients = Client::all();

        return view('admin.users',compact('clients'));
    }
}
