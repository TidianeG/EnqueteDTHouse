<?php

namespace App\Http\Controllers;

use App\Models\Profilage;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfilageController extends Controller
{
    public function get_profilage()
    {
        $user_id = Auth::user()->client_id;
        $profilage = Profilage::where('client_id','=',$user_id)->first();
        return view('users.profilage',compact('profilage'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    public function create_profilage(Request $request)
    {
        $find_profilage_exist= Profilage::where('client_id','=',Auth::user()->client_id)->first();

        if($find_profilage_exist){
            $profilage = $find_profilage_exist;
            return redirect()->route('get_profilage',[$profilage]);
        }
        
        if(!$find_profilage_exist){
            $profilage = new Profilage();
            $profilage->optionregion=$request->input('optionregion');
            $profilage->optionpersonnemenage=$request->input('optionpersonnemenage');
            $profilage->optionetatcivil=$request->input('radioetatcivil');
            $profilage->optionacheteproduit=$request->input('optionacheteproduit');
            $profilage->optionlogement=$request->input('logement');
            $profilage->optionnbreenfant=$request->input('radionbreenfant');
            $profilage->optionappareilmenager= implode(", ", $request->input('appareilmenager'));
            $profilage->optionniveaueducation=$request->input('radioniveaueducation');
            $profilage->optionsituationprofe=$request->input('radiosituprof');
            $profilage->optionservice=$request->input('radioservice');
            $profilage->optiontelephone=$request->input('radiotelephone');
            $profilage->optionvoiture=$request->input('radiovoiture');
            $profilage->optionvoyage=$request->input('voyage');
            $profilage->optionproduitselectro=implode(", ", $request->input('produitsElectro'));
            $profilage->optionboisson=implode(", ", $request->input('boissons'));
            $profilage->optionempruntepret=$request->input('emprunte');
            $profilage->optionfrequencefume=$request->input('frequencefume');
            $profilage->optionelecteur=$request->input('electeurinscrit');
            $profilage->client_id= Auth::user()->client_id;
            
            //dd($profilage);
            $profilage->save();

            return redirect()->route('get_profilage',[$profilage]);
        }

        
    }
}
