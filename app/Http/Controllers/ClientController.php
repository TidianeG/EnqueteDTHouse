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
        $client->save();

        $user= new User();

            $user_val='user';
                $user->name = $request->input('prenom');
                $user->email= $request->input('email');
                $user->password= Hash::make($request->input('password'));
                
                $user->roles= $user_val;
                $user->client_id= $client->id;
                $user->email_verified = 0;
            $save = $user->save();

            $last_id = $user->id;
            $token = $last_id.hash('sha256', Str::random(120));
            $verifyURL = route('verify', ['token'=>$token, 'service'=>'Email_verification']);

            VerifyUser::create([
                'user_id'=>$last_id,
                'token' =>$token,
            ]);

            $message = 'Bonjour <b>'.$request->name.'</b>';
            $message.='Merci pour votre inscription, nous vous demandons de verifier votre adresse mail pour completer votre inscription.';

            $email_data = [
                'recipient'=>$request->email,
                'fromEmail'=>$request->email,
                'fromName'=>$request->name,
                'subject'=>'Email verification',
                'body'=>$message,
                'actionLink'=>$verifyURL,
            ];

            /*Mail::send('email_template', $email_data, function($message) use ($email_data)
            {
                $message->to($email_data['recipient'])
                        ->from($email_data['fromEmail'], $email_data['fromName'])
                        ->subject($email_data['subject']);
            });*/

            if ($save) {
                return redirect()->back()->with(['success' => "Verifier votre compte nous vous avons envoyé un lin d'activation"]);
            }

            else {
                return redirect()->back()->with(['error' => "Erreur d'inscripion"]);
            }

            
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

    public function verify(Request $request)
    {
        $token = $request->token;
        $verifyUser = VerifyUser::where('token',$token)->first();
        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->email_verified) {
                $verifyUser->user->email_verified = 1;
                $verifyUser->user->save();

                return redirect()->route('login')->with('info','Votre email a été vérifier avec succee. Vous pouvez vous connecter')->with('verifiedEmail', $user->email);
                
            } else {
                return redirect()->route('login')->with('info','Votre email deja verifier. Vous pouvez vous connecter')->with('verifiedEmail', $user->email);
            }
            
        } 
        
    }

    public function get_info_profil()
    {
        $user_id= Auth::user()->client_id;
        $client = Client::find($user_id);
        //dd($client);
        return view('users.profile',compact('client'));
    }
}
