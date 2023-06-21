<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
//use App\Models\Message;

class SendMailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendmail_user(Request $request){

        //$message = new Message();

        $cible = $request->input('cible');
        $objet = $request->input('objet');
        $message = $request->input('message');

        if ($cible=='cible_all') {
            //dd($cible);
            $users = User::where('roles','=','user')->get();
            $count=0;
            foreach ($users as $user) {
                $email_data = [
                    'recipient'=>$user->email,
                    'fromEmail'=>'gaye95ahmeth@outlook.com',
                    'fromName'=>'Enquete DThouse',
                    'subject'=>$objet,
                    'body'=>$message,
                    
                ];
                //dd($email_data);
                Mail::send('email_newsletter', $email_data, function($message) use ($email_data)
                {
                    $message->to($email_data['recipient'])
                            ->from($email_data['fromEmail'], $email_data['fromName'])
                            ->subject($email_data['subject']);
                });  
                $count++; 
            }
            if ($count>0) {
                $message = new Message();
                $message->objet= $objet;
                $message->message= $message;
                $message->cible= 'Tous les utilisateurs';
                $message->user_id= Auth::user()->id;
                $verif_send=$message->save();
                if ($verif_send) {
                    return redirect()->back()->with(['success' => "Message envoyé"]);
                }
                else {
                    return redirect()->back()->with(['error' => "Message non envoyé"]);
                }
            }
            else {
                return redirect()->back()->with(['error' => "Message non envoyé"]);
            }
            
        }

        elseif($cible=='cible_multiple') {
            //dd($cible);
            $users = User::where('roles','=','user')->get();
            foreach ($users as $user) {
                $email_data = [
                    'recipient'=>$user->email,
                    'fromEmail'=>'gaye95ahmeth@outlook.com',
                    'fromName'=>'Enquete DThouse',
                    'subject'=>$objet,
                    'body'=>$message,
                    
                ];
                //dd($email_data);
                Mail::send('email_newsletter', $email_data, function($message) use ($email_data)
                {
                    $message->to($email_data['recipient'])
                            ->from($email_data['fromEmail'], $email_data['fromName'])
                            ->subject($email_data['subject']);
                });
                return response()->json(['status' => 'success']);   
            } 
        }
         else {
            if ($cible=='cible_un') {
                $email = $request->input('email_un');
                $email_data = [
                    'recipient'=>$email,
                    'fromEmail'=>'gaye95ahmeth@outlook.com',
                    'fromName'=>'Enquete DThouse',
                    'subject'=>$objet,
                    'body'=>$message,
                    
                ];
                //dd($email_data);
                $verif_send=Mail::send('email_newsletter', $email_data, function($message) use ($email_data)
                {
                    $message->to($email_data['recipient'])
                            ->from($email_data['fromEmail'], $email_data['fromName'])
                            ->subject($email_data['subject']);
                });
                if ($verif_send) {
                    $message = new Message();
                    $message->objet= $objet;
                    $message->message= $message;
                    $message->cible= $email;
                    $message->user_id= Auth::user()->id;
                    $verif_save=$message->save();
                    if ($verif_save) {
                        return redirect()->back()->with(['success' => "Message envoyé"]);
                    }
                    else {
                        return redirect()->back()->with(['error' => "Message non envoyé"]);
                    }
                }
                else {
                    return redirect()->back()->with(['error' => "Message non envoyé"]);
                }
            }
         }

    }
}
