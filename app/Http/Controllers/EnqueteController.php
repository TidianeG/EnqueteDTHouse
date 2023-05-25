<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Enquete;

class EnqueteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_enquetes()
    {
        $client = Auth::user()->client;
        $naissance = $client->naissance;
        $aujourdhui = date("Y-m-d");
        $diff = date_diff(date_create($naissance), date_create($aujourdhui));
        $age = (integer)$diff->format('%y');
        
        if ($age<15) {
            $plage = 'enfant';
        }
        elseif ($age>=15 && $age<=19) {
            $plage = 'adolescent';
        }
        elseif ($age>=20 && $age<=26) {
            $plage = 'adulte';
        }
        else {
            $plage = 'adulteplus';
        }
        $enquetes = Enquete::where('pays','=',$client->pays)
                            ->where('profession','=',$client->profession)
                            ->where('sexe','=',$client->genre)
                            ->where('age','=',$plage)
                            ->where('niveau_etude','=',$client->niveau_etude)->get();
            //dd($enquetes);
        return view('users.enquetes', compact('enquetes'));
    }
}
