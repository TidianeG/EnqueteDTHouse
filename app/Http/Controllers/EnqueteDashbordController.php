<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquete;
use Illuminate\Support\Facades\Http;
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
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'https://kc.kobotoolbox.org/api/v1/data', [
            'auth' => ['tidiane_27', '27ndawGAYE']
        ]);

        /*$response = Http::get('https://kc.kobotoolbox.org/api/v1/data',[
            'auth' => ['tidiane_27','27ndawGAYE']
        ]);*/
        if ($res->getStatusCode()==200) {
            $response =json_decode($res->getBody());
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

        $save_enquete=$enquete->save();
        if ($save_enquete) {
            return redirect('/createEnqueteXPEJJDZK89')->with('success','ENQUÊTE créée avec succès!!!');
        }

        else {
            return redirect('/createEnqueteXPEJJDZK89')->with('error','Erreur lors de la création de l\'enquete. Vérifier les données saisies.');
        }
    }
}
