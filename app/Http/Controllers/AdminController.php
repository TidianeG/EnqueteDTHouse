<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Validateur;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function dashbord_admin()
    {
        return redirect()->route('getEnquetesXPOKJDUEDDJH');
    }

    public function get_info_profile()
    {
        $user_id= Auth::user()->validateur;
        $validateur = $user_id;
        //dd($client);
        return view('admin.profile',compact('validateur'));
    }

    public function enable_user($slug){
        $user=User::find($slug);
        $user->email_verified=1;
        $verif_valid=$user->save();
        if ($verif_valid) {
            return redirect()->back()->with(['success' => "Le compte est maintenant avtivé"]);
        }
        else {
            return redirect()->back()->with(['error' => "Compte non avtivé, verifier les parametre"]);
        }
    }

    public function disable_user($slug){
        $user=User::find($slug);
        $user->email_verified=0;
        $verif_valid=$user->save();
        if ($verif_valid) {
            return redirect()->back()->with(['success' => "Le compte est maintenant désactivé"]);
        }
        else {
            return redirect()->back()->with(['error' => "Compte non désactivé, verifier les parametre"]);
        }
    }
}
