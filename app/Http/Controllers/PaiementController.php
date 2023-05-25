<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function get_paiement()
    {
        return view('users.paiement');
    }
}
