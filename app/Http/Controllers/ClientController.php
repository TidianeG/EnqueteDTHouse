<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function createClient(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:255',
            'phone' => 'required',
        ]);

        $verif_phone = Client::where('telephone', '=',$request->phone)->first();
        $verif_email = User::where('email', '=',$request->email)->first();
        
        // On verifie si le numéro de téléphone ajouté existe dans la base
        if($verif_phone){
            return redirect()->back()->with(['error' => "Le numéro de téléphone est dèja utilisé"]);
        }
        // On verifie si l'Email ajouté existe dans la base
        elseif ($verif_email) {
            return redirect()->back()->with(['error' => "L'adresse mail est dèja utiisé"]);
        }

        $client = new Client();
        $client->prenom = $request->input('prenom');
        $client->nom = $request->input('nom');
        $client->naissance = $request->input('naissance');
        $client->genre = $request->input('genre');
        $client->telephone = $request->input('phone');
        $client->pays = $request->input('pays');
        $client->langue = $request->input('langue');
        $client->niveau_etude = $request->input('niveau_etude');
        $client->profession = $request->input('profession');
        //dd($client);
        

        $user= new User();

            $user_val='user';
                $user->name = $request->input('prenom');
                $user->email= $request->input('email');
                $user->password= Hash::make($request->input('password'));
                
                $user->roles= $user_val;
                
                $user->email_verified = 0;
            $save = $user->save();

            $client->user_id= $user->id;
            $client->save();

            $last_id = $user->id;
            $token = $last_id.hash('sha256', Str::random(120));
            $verifyURL = route('verify', ['token'=>$token]);

            VerifyUser::create([
                'user_id'=>$last_id,
                'token' =>$token,
            ]);

            $message = 'Bonjour <b>'.$request->name.'</b>';
            $message.='Merci pour votre inscription, nous vous demandons de verifier votre adresse mail pour completer votre inscription.';

            $email_data = [
                'recipient'=>$request->email,
                'fromEmail'=>'gaye95ahmeth@outlook.com',
                'fromName'=>'Enquete DThouse',
                'subject'=>'Email verification',
                'body'=>$message,
                'actionLink'=>$verifyURL,
                'token' =>$token,
            ];

            Mail::send('email_template', $email_data, function($message) use ($email_data)
            {
                $message->to($email_data['recipient'])
                        ->from($email_data['fromEmail'], $email_data['fromName'])
                        ->subject($email_data['subject']);
            });

            if ($save) {
                return redirect()->back()->with(['success' => "Compte créé. Verifier votre compte nous vous avons envoyé un lin d'activation"]);
            }

            else {
                return redirect()->back()->with(['error' => "Erreur d'inscripion"]);
            }
        //return redirect()->back()->with(['error' => "Erreur d'inscripion"]);
            
    }

    public function update_profile(Request $request,$id)
    {
        $client = Client::find($id);
        $client->nom = $request->input('nom_edit');
        $client->prenom = $request->input('prenom_edit');
        $client->naissance = $request->input('naissance_edit');
        $client->genre = $request->input('genre_edit');
        $client->pays = $request->input('pays_edit');
        $client->langue = $request->input('langue_edit');
        $client->telephone = $request->input('phone_edit');
        
        $client->update();
        return redirect()->back()->with('status','Client modifié avec succès!!');
    }

    public function update_user_email(Request $request)
    {
        $new_email = $request->input('new_email');

        $user=Auth::user();
        
        $user_verif= User::where('email', '=', $new_email)->first();
        //dd($user_verif);
        if (!$user_verif) {
            $user->email = $new_email;
            $user->save();
            if($user){
                return redirect()->back()->with('status','Email modifié avec succès!!');
            }

            else {
                return redirect()->back()->with('failed','Erreur lors de la mise à jour de l\'Email');
            }
        }

        else {
            return redirect()->back()->with('failed','L\'Email renseigné est déja lié à un compte');
        }
        
    }

    public function update_user_password(Request $request)
        {
            $curr_password = $request->input('password_old');
            $new_password  = $request->input('password_new');
            $confirm_password  = $request->input('password_confirmation');


            if(!Hash::check($curr_password,Auth::user()->password)){
                return redirect()->back()->with('failed','Erreur lors de la mise à jour du mot de passe');
            }
            else{
                $user=Auth::user();
                $user->password = Hash::make($new_password);
                $user->save();
                //$request->user()->fill(['password' => Hash::make($new_password)])->save;
                return redirect()->back()->with('status','Mot de passe modifié avec succès!!');

            } 
        }

    public function verify($token)
        {
            $verifyUser = VerifyUser::where('token', $token)->first();
            
            if (!is_null($verifyUser)) {
                $user = $verifyUser->user;
                if (!$user->email_verified) {
                    $verifyUser->user->email_verified = 1;
                    $verifyUser->user->save();

                    return redirect()->route('login')->with('info','Votre email a été vérifier avec succè. Vous pouvez vous connecter')->with('verifiedEmail', $user->email);
                    
                } else {
                    return redirect()->route('login')->with('error','Votre email est déja verifier. Vous pouvez vous connecter')->with('verifiedEmail', $user->email);
                }
                
            } 
            return redirect()->route('login')->with('error','Votre email est déja verifier. Vous pouvez vous connecter')->with('verifiedEmail', $user->email);
            
        }

    public function get_info_profil()
    {
        $user_id= Auth::user()->client;
        $client = $user_id;
        //dd($client);
        return view('users.profile',compact('client'));
    }

    public function delete_account(Request $request)
    {
        $user=Auth::user();
        $user->email_verified=0;
        $user->save();
        
        Auth::logout();
        return redirect('/login');
    }
}
