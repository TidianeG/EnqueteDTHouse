<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Validateur;
use App\Models\Roles;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ValidateurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_validateur(){
        $validateurs = User::where('roles','=','superuser')->get();
        return view('admin.get_validateur', compact('validateurs'));
    }

    public function create_validateur(Request $request){
        $validated = $request->validate([
            'email' => 'required|max:255',
            'phone' => 'required',
        ]);
        $verif_phone = Validateur::where('telephone', '=',$request->phone)->first();
        $verif_email = User::where('email', '=',$request->email)->first();
        
        // On verifie si le numéro de téléphone ajouté existe dans la base
        if($verif_phone){
            return response()->json(['status' => 'phone error']);
        }
        // On verifie si l'Email ajouté existe dans la base
        elseif ($verif_email) {
            return response()->json(['status' => 'email error']);
        }
        else {
            $roles = $request->input('role');
            
            //Création du compte superuser
            $user= new User();

                $user_val='superuser';
                    $user->name = $request->prenom;
                    $user->email= $request->email;
                    $user->password= Hash::make($request->password);
                    
                    $user->roles= $user_val;
                    
                    $user->email_verified = 1;
                $save = $user->save();
                // Si le superuser est créé
            if ($save) {
                //On enregistre les données personnelles dans la table validateur
                $validateur = new Validateur();
                $validateur->prenom = $request->prenom;
                $validateur->nom = $request->nom;
                $validateur->naissance = $request->naissance;
                $validateur->telephone = $request->phone;
                $validateur->pays = $request->pays;
                $validateur->langue = $request->langue;
                $validateur->user_id= $user->id;
                $validateur_save = $validateur->save();
                if ($validateur_save) {
                    $role_db = new Roles();
                    foreach ($roles as $role) {
                        if ($role=='validateur') {
                            $role_db->validateur=true;

                        }
                        elseif($role=='createur'){
                            $role_db->createur=true;
                        }
                        else {
                            $role_db->supprimer=true;
                        }
                    }
                    $role_db->validateur_id=$validateur->id;
                    $role_result=$role_db->save();
                    if ($role_result) {
                        $message = 'Bonjour <b>'.$request->prenom.'</b>,<br>';
                        $message.='Ci-desous vos informations de connexion.<br>Identifiant : <b>'.$request->email.'</b> <br>Mot de passe : <b>'.$request->password.'</b>';

                        $email_data = [
                            'recipient'=>$user->email,
                            'fromEmail'=>'gaye95ahmeth@outlook.com',
                            'fromName'=>'Enquete DThouse',
                            'subject'=>'Identifiant de connexion',
                            'body'=>$message,
                            
                        ];
                        //dd($email_data);
                        
                        Mail::send('email_identifiant', $email_data, function($message) use ($email_data)
                        {
                            $message->to($email_data['recipient'])
                                    ->from($email_data['fromEmail'], $email_data['fromName'])
                                    ->subject($email_data['subject']);
                        });
                            return response()->json(['status' => 'success']);   
                        
                    }
                    
                }

                
            }
            else{
                return response()->json(['status'=>'error']);
            }
        }
        
            
    }

    public function info_detail_validateur($slug) {
        $validateur = Validateur::find($slug);

        return view('admin.info_detail_validateur', compact('validateur'));
    }
}
