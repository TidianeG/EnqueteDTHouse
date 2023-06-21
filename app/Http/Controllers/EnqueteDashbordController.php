<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use Illuminate\Support\Facades\Http;
use App\Models\Client;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp;

class EnqueteDashbordController extends Controller
{
    public function getEnquetes()
    {
        $enquetes = Enquete::all();
        return view('admin.enquete', compact('enquetes'));
    }

    public function getEnquetesSubmit()
    {
        $response = Http::get('https://kc.kobotoolbox.org/api/v1/data');
        return $response;
    }


    public function create_enquete()
    {
        $client = new GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
        //$client->setDefaultOption('verify', false);
        $option=[
            'auth' => ['tidiane_27', '27ndawGAYE']
        ];
        $res = $client->request('GET', 'https://kc.kobotoolbox.org/api/v1/data',$option);

        /*$response_result = Http::get('https://kf.kobotoolbox.org/api/v1/forms',[
            'auth' => ['tidiane_27','27ndawGAYE']
        ]);*/

        if ($res->getStatusCode()==200) {
            $response =json_decode($res->getBody());
            dd($response);
            return view('admin.saveenquete',compact('response'));
        }
        
        else {
            $response=[];
            return view('admin.saveenquete',compact('response'));
        }
        //echo $response;
        //dd($response);    
    }

    public function save_enquete(Request $request)
    {
        $enquete = new Enquete();
        $enquete->nom = $request->input('nom');
        $enquete->duree = $request->input('duree');
        $enquete->prix = $request->input('prix');
        $enquete->lien_enquete = $request->input('lien');
        $enquete->type_enquete = $request->input('type_enquete');
        $enquete->niveau_etude = $request->input('niveau_etude');
        $enquete->sexe = $request->input('sexe');
        $enquete->age = $request->input('age');
        $enquete->nombre_max_enquete = $request->input('nombre_max');
        $enquete->etat = 'enabled';
        $enquete->pays = $request->input('pays');
        $enquete->profession = $request->input('profession');
        $enquete->user_id=Auth::user()->id;
        $save_enquete=$enquete->save();
        if ($save_enquete) {
            return redirect('/getEnquetesXPOKJDUEDDJH')->with('success','ENQUÊTE créée avec succès!!!');
        }

        else {
            return redirect('/getEnquetesXPOKJDUEDDJH')->with('error','Erreur lors de la création de l\'enquete. Vérifier les données saisies.');
        }
    }

    public function messagesend() {
        $messages = Message::all();
        return view('admin.message', compact('messages'));
    }

    public function sendMail(Request $request){

    }

    public function info_detail_client($slug){

        $client = Client::find($slug);
        $user  = User::find($client->user_id);
        return view('admin.info-detail-client', compact('client','user'));
    }

    public function info_detail_enquete($slug) {
        $enquete = Enquete::find($slug);

        return view('admin.info_detail_enquete', compact('enquete'));
    }
}
