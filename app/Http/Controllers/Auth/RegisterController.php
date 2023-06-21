<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'prenom' => ['required', 'string', 'max:255'],
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        /*dd($data);
        $client = Client::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'naissance' => $data['naissance'],
            'genre' => $data['genre'],
            'phone' => $data['phone'],
            'pays' => $data['pays'],
            'langue' => $data['langue'],
        ]);
        */
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
        
        if($client){
            return User::create([
                'name' => $data['prenom'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'roles' => 'user',
                'client_id'=> $client->id,
                'email_verified' => 0,
            ]);
        }

        $message = 'Bonjour ';
        $message.='Merci pour votre inscription, nous vous demandons de verifier votre adresse mail pour completer votre inscription.';
        $verifyURL='google.com';
        $email_data = [
            'recipient'=>'gaye95ahmeth@outlook.com',
            'fromEmail'=>'gaye95ahmeth@gmail.com',
            'fromName'=>'Cheikh',
            'subject'=>'Email verification',
            'body'=>$message,
            'actionLink'=>$verifyURL,
        ];

        Mail::send('email_template', $email_data, function($message) use ($email_data)
        {
            $message->to($email_data['recipient'])
                    ->from($email_data['fromEmail'], $email_data['fromName'])
                    ->subject($email_data['subject']);
        });

        if ($save) {
            return redirect()->back()->with(['success' => "Verifier votre compte nous vous avons envoyé un lin d'activation"]);
        }

        else {
            return redirect()->back()->with(['error' => "Erreur d'inscripion"]);
        }
      
    }
}
