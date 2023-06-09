@extends('layouts.appadmin')
    @section('content')
        <div class="content-wrapper">
            <div class="container-fluid">
                        @if (session('error'))
                            <div id="div1" style="visibility: hidden" class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="d-flex">
                                    <div class="toast-body">
                                    {{ session('error') }}
                                </div>
                                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                            </div>
                                
                            @endif
                            @if (session('success'))
                                <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                        {{ session('success') }}
                                    </div>
                                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                                
                            @endif
                <div class="d-flex justify-content-between mb-3">
                    <h4>ENQUÊTES</h4>
                    @if(Auth::user()->roles=='admin' || Auth::user()->validateur->role->createur)
                        <div>
                            <a class="btn btn-success"  href="/createEnqueteXPEJJDZK89" ><i class="fa-solid fa-plus"></i> Nouvelle Enquete</a>
                        </div>
                    @endif
                </div>
                <div class="card" style="">
                    <div class="card-header">
                        <h5>Liste des ENQUÊTES</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table  table-hover table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Durée</th>
                                    <th class="text-center">Pays</th>
                                    <th class="text-center">Lien enquete</th>
                                    <th class="text-center">Type enquete</th>
                                    <th class="text-center">Nombre Max </th>
                                    <th class="text-center">Etat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enquetes as $enquete)
                                    <tr class="tr-hover">
                                        <td class="text-center">{{$enquete->nom}}</td>
                                        <td class="text-center">{{$enquete->duree}}</td>
                                        <td class="text-center">{{$enquete->pays}}</td>
                                        <td class="text-center">{{$enquete->lien_enquete}}</td>
                                        <td class="text-center">{{$enquete->type_enquete}}</td>
                                        <td class="text-center">{{$enquete->nombre_max_enquete}}</td>
                                        <td class="text-center">{{$enquete->etat}}</td>
                                        <td class="text-center d-flex justify-content-around"> 
                                            <a href="{{route('info_detail_enquete',$enquete->id)}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                            @if(Auth::user()->roles=='admin' || Auth::user()->validateur->role->supprimer)
                                                <a href="#" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                
            </div>
        </div>

        <!--Debut Modal création Enquete-->
            <div class="modal fade bg-theme" id="modal_create_enquete">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h6>Nouvelle Enquête</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>                        
                        <!-- Modal body -->
                        <div class="modal-body container">
                            <form method="post" action="{{route('saveEnqueteXPEJJDZK89')}}" id="form_register">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName" class="">Nom enquête <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="text" required name="nom" id="nom" class="form-control input-shadow" placeholder="Nom enquete">
                                            <div class="form-control-position">
                                                <i class="icon-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName" class="">Durée de l'enquête <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="number" required name="duree" id="duree" class="form-control input-shadow" placeholder="Durée enquete">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7">
                                        <label for="exampleInputName" class="">Prix de l’enquête <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="number" required name="prix" id="prix" class="form-control input-shadow" >
                                            
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="exampleInputName" class="">Lien de l’enquête <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="url" required name="lien" id="lien" class="form-control input-shadow" >
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName" class="">Type enquête <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <select name="type_enquete" id="type_enquete" class="form-control input-shadow">
                                                <option value="commerce">Commerce</option>
                                                <option value="transport">Transport</option>
                                                <option value="agriculture">Agriculture</option>
                                                <option value="service">Service</option>
                                                <option value="industrie">Industrie</option>
                                                <option value="autre">Autre</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName" class="">Niveau d'étude <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <select name="niveau_etude" id="niveau_etude" class="form-control input-shadow">
                                                <option value="baccalaureat">Baccalauréat</option>
                                                <option value="bac+2">Bac+2</option>
                                                <option value="bac+3">Bac+3</option>
                                                <option value="master">Master</option>
                                                <option value="doctorat">Doctorat</option>
                                                <option value="autre">Autre</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName" class="">Pays <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <select name="pays" id="pays" class="form-control input-shadow">
                                                <option value="Senegal" selected="selected">Senegal </option>

                                                <option value="Afghanistan">Afghanistan </option>
                                                <option value="Afrique_Centrale">Afrique_Centrale </option>
                                                <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                                <option value="Albanie">Albanie </option>
                                                <option value="Algerie">Algerie </option>
                                                <option value="Allemagne">Allemagne </option>
                                                <option value="Andorre">Andorre </option>
                                                <option value="Angola">Angola </option>
                                                <option value="Anguilla">Anguilla </option>
                                                <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                                <option value="Argentine">Argentine </option>
                                                <option value="Armenie">Armenie </option>
                                                <option value="Australie">Australie </option>
                                                <option value="Autriche">Autriche </option>
                                                <option value="Azerbaidjan">Azerbaidjan </option>

                                                <option value="Bahamas">Bahamas </option>
                                                <option value="Bangladesh">Bangladesh </option>
                                                <option value="Barbade">Barbade </option>
                                                <option value="Bahrein">Bahrein </option>
                                                <option value="Belgique">Belgique </option>
                                                <option value="Belize">Belize </option>
                                                <option value="Benin">Benin </option>
                                                <option value="Bermudes">Bermudes </option>
                                                <option value="Bielorussie">Bielorussie </option>
                                                <option value="Bolivie">Bolivie </option>
                                                <option value="Botswana">Botswana </option>
                                                <option value="Bhoutan">Bhoutan </option>
                                                <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                                <option value="Bresil">Bresil </option>
                                                <option value="Brunei">Brunei </option>
                                                <option value="Bulgarie">Bulgarie </option>
                                                <option value="Burkina_Faso">Burkina_Faso </option>
                                                <option value="Burundi">Burundi </option>

                                                <option value="Caiman">Caiman </option>
                                                <option value="Cambodge">Cambodge </option>
                                                <option value="Cameroun">Cameroun </option>
                                                <option value="Canada">Canada </option>
                                                <option value="Canaries">Canaries </option>
                                                <option value="Cap_vert">Cap_Vert </option>
                                                <option value="Chili">Chili </option>
                                                <option value="Chine">Chine </option>
                                                <option value="Chypre">Chypre </option>
                                                <option value="Colombie">Colombie </option>
                                                <option value="Comores">Colombie </option>
                                                <option value="Congo">Congo </option>
                                                <option value="Congo_democratique">Congo_democratique </option>
                                                <option value="Cook">Cook </option>
                                                <option value="Coree_du_Nord">Coree_du_Nord </option>
                                                <option value="Coree_du_Sud">Coree_du_Sud </option>
                                                <option value="Costa_Rica">Costa_Rica </option>
                                                <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                                <option value="Croatie">Croatie </option>
                                                <option value="Cuba">Cuba </option>

                                                <option value="Danemark">Danemark </option>
                                                <option value="Djibouti">Djibouti </option>
                                                <option value="Dominique">Dominique </option>

                                                <option value="Egypte">Egypte </option>
                                                <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                                <option value="Equateur">Equateur </option>
                                                <option value="Erythree">Erythree </option>
                                                <option value="Espagne">Espagne </option>
                                                <option value="Estonie">Estonie </option>
                                                <option value="Etats_Unis">Etats_Unis </option>
                                                <option value="Ethiopie">Ethiopie </option>

                                                <option value="Falkland">Falkland </option>
                                                <option value="Feroe">Feroe </option>
                                                <option value="Fidji">Fidji </option>
                                                <option value="Finlande">Finlande </option>
                                                <option value="France">France </option>

                                                <option value="Gabon">Gabon </option>
                                                <option value="Gambie">Gambie </option>
                                                <option value="Georgie">Georgie </option>
                                                <option value="Ghana">Ghana </option>
                                                <option value="Gibraltar">Gibraltar </option>
                                                <option value="Grece">Grece </option>
                                                <option value="Grenade">Grenade </option>
                                                <option value="Groenland">Groenland </option>
                                                <option value="Guadeloupe">Guadeloupe </option>
                                                <option value="Guam">Guam </option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernesey">Guernesey </option>
                                                <option value="Guinee">Guinee </option>
                                                <option value="Guinee_Bissau">Guinee_Bissau </option>
                                                <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                                <option value="Guyana">Guyana </option>
                                                <option value="Guyane_Francaise ">Guyane_Francaise </option>

                                                <option value="Haiti">Haiti </option>
                                                <option value="Hawaii">Hawaii </option>
                                                <option value="Honduras">Honduras </option>
                                                <option value="Hong_Kong">Hong_Kong </option>
                                                <option value="Hongrie">Hongrie </option>

                                                <option value="Inde">Inde </option>
                                                <option value="Indonesie">Indonesie </option>
                                                <option value="Iran">Iran </option>
                                                <option value="Iraq">Iraq </option>
                                                <option value="Irlande">Irlande </option>
                                                <option value="Islande">Islande </option>
                                                <option value="Israel">Israel </option>
                                                <option value="Italie">italie </option>

                                                <option value="Jamaique">Jamaique </option>
                                                <option value="Jan Mayen">Jan Mayen </option>
                                                <option value="Japon">Japon </option>
                                                <option value="Jersey">Jersey </option>
                                                <option value="Jordanie">Jordanie </option>

                                                <option value="Kazakhstan">Kazakhstan </option>
                                                <option value="Kenya">Kenya </option>
                                                <option value="Kirghizstan">Kirghizistan </option>
                                                <option value="Kiribati">Kiribati </option>
                                                <option value="Koweit">Koweit </option>

                                                <option value="Laos">Laos </option>
                                                <option value="Lesotho">Lesotho </option>
                                                <option value="Lettonie">Lettonie </option>
                                                <option value="Liban">Liban </option>
                                                <option value="Liberia">Liberia </option>
                                                <option value="Liechtenstein">Liechtenstein </option>
                                                <option value="Lituanie">Lituanie </option>
                                                <option value="Luxembourg">Luxembourg </option>
                                                <option value="Lybie">Lybie </option>

                                                <option value="Macao">Macao </option>
                                                <option value="Macedoine">Macedoine </option>
                                                <option value="Madagascar">Madagascar </option>
                                                <option value="Madère">Madère </option>
                                                <option value="Malaisie">Malaisie </option>
                                                <option value="Malawi">Malawi </option>
                                                <option value="Maldives">Maldives </option>
                                                <option value="Mali">Mali </option>
                                                <option value="Malte">Malte </option>
                                                <option value="Man">Man </option>
                                                <option value="Mariannes du Nord">Mariannes du Nord </option>
                                                <option value="Maroc">Maroc </option>
                                                <option value="Marshall">Marshall </option>
                                                <option value="Martinique">Martinique </option>
                                                <option value="Maurice">Maurice </option>
                                                <option value="Mauritanie">Mauritanie </option>
                                                <option value="Mayotte">Mayotte </option>
                                                <option value="Mexique">Mexique </option>
                                                <option value="Micronesie">Micronesie </option>
                                                <option value="Midway">Midway </option>
                                                <option value="Moldavie">Moldavie </option>
                                                <option value="Monaco">Monaco </option>
                                                <option value="Mongolie">Mongolie </option>
                                                <option value="Montserrat">Montserrat </option>
                                                <option value="Mozambique">Mozambique </option>

                                                <option value="Namibie">Namibie </option>
                                                <option value="Nauru">Nauru </option>
                                                <option value="Nepal">Nepal </option>
                                                <option value="Nicaragua">Nicaragua </option>
                                                <option value="Niger">Niger </option>
                                                <option value="Nigeria">Nigeria </option>
                                                <option value="Niue">Niue </option>
                                                <option value="Norfolk">Norfolk </option>
                                                <option value="Norvege">Norvege </option>
                                                <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                                <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                                                <option value="Oman">Oman </option>
                                                <option value="Ouganda">Ouganda </option>
                                                <option value="Ouzbekistan">Ouzbekistan </option>

                                                <option value="Pakistan">Pakistan </option>
                                                <option value="Palau">Palau </option>
                                                <option value="Palestine">Palestine </option>
                                                <option value="Panama">Panama </option>
                                                <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                                <option value="Paraguay">Paraguay </option>
                                                <option value="Pays_Bas">Pays_Bas </option>
                                                <option value="Perou">Perou </option>
                                                <option value="Philippines">Philippines </option>
                                                <option value="Pologne">Pologne </option>
                                                <option value="Polynesie">Polynesie </option>
                                                <option value="Porto_Rico">Porto_Rico </option>
                                                <option value="Portugal">Portugal </option>

                                                <option value="Qatar">Qatar </option>

                                                <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                                <option value="Republique_Tcheque">Republique_Tcheque </option>
                                                <option value="Reunion">Reunion </option>
                                                <option value="Roumanie">Roumanie </option>
                                                <option value="Royaume_Uni">Royaume_Uni </option>
                                                <option value="Russie">Russie </option>
                                                <option value="Rwanda">Rwanda </option>

                                                <option value="Sahara Occidental">Sahara Occidental </option>
                                                <option value="Sainte_Lucie">Sainte_Lucie </option>
                                                <option value="Saint_Marin">Saint_Marin </option>
                                                <option value="Salomon">Salomon </option>
                                                <option value="Salvador">Salvador </option>
                                                <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                                <option value="Samoa_Americaine">Samoa_Americaine </option>
                                                <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                                                <option value="Senegal">Senegal </option>
                                                <option value="Seychelles">Seychelles </option>
                                                <option value="Sierra Leone">Sierra Leone </option>
                                                <option value="Singapour">Singapour </option>
                                                <option value="Slovaquie">Slovaquie </option>
                                                <option value="Slovenie">Slovenie</option>
                                                <option value="Somalie">Somalie </option>
                                                <option value="Soudan">Soudan </option>
                                                <option value="Sri_Lanka">Sri_Lanka </option>
                                                <option value="Suede">Suede </option>
                                                <option value="Suisse">Suisse </option>
                                                <option value="Surinam">Surinam </option>
                                                <option value="Swaziland">Swaziland </option>
                                                <option value="Syrie">Syrie </option>

                                                <option value="Tadjikistan">Tadjikistan </option>
                                                <option value="Taiwan">Taiwan </option>
                                                <option value="Tonga">Tonga </option>
                                                <option value="Tanzanie">Tanzanie </option>
                                                <option value="Tchad">Tchad </option>
                                                <option value="Thailande">Thailande </option>
                                                <option value="Tibet">Tibet </option>
                                                <option value="Timor_Oriental">Timor_Oriental </option>
                                                <option value="Togo">Togo </option>
                                                <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                                <option value="Tristan da cunha">Tristan de cuncha </option>
                                                <option value="Tunisie">Tunisie </option>
                                                <option value="Turkmenistan">Turmenistan </option>
                                                <option value="Turquie">Turquie </option>

                                                <option value="Ukraine">Ukraine </option>
                                                <option value="Uruguay">Uruguay </option>

                                                <option value="Vanuatu">Vanuatu </option>
                                                <option value="Vatican">Vatican </option>
                                                <option value="Venezuela">Venezuela </option>
                                                <option value="Vierges_Americaines">Vierges_Americaines </option>
                                                <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                                <option value="Vietnam">Vietnam </option>

                                                <option value="Wake">Wake </option>
                                                <option value="Wallis et Futuma">Wallis et Futuma </option>

                                                <option value="Yemen">Yemen </option>
                                                <option value="Yougoslavie">Yougoslavie </option>

                                                <option value="Zambie">Zambie </option>
                                                <option value="Zimbabwe">Zimbabwe </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputName" class="">Profession <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <select name="profession" id="profession" class="form-control input-shadow">
                                                <option value="etudiant">Étudiant</option>
                                                <option value="eleve">Élève</option>
                                                <option value="ingenieur">Ingénieur</option>
                                                <option value="infirmier">Infirmier</option>
                                                <option value="medecin">Médecin</option>
                                                <option value="geologue">Géologue</option>
                                                <option value="ouvrier">Ouvrier</option>
                                                <option value="autre">Autre</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputName" class="">Sexe <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <select name="sexe" id="sexe" class="form-control input-shadow">
                                                <option value="masculin">Masculin</option>
                                                <option value="feminin">Feminin</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputName" class="">Age <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <select name="age" id="age" class="form-control input-shadow">
                                                <option value="enfant">- 15 ans</option>
                                                <option value="adolescent">15 à 19 ans</option>
                                                <option value="adulte">20 à 26 ans</option>
                                                <option value="adulteplus">plus de 26 ans</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputName" class="">Nombres Max <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="number" required name="nombre_max" id="nombre_max" class="form-control input-shadow" >
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start mt-4">
                                    
                                    <button type="submit" class="btn btn-success btn-block waves-effect waves-light m-2" style="width: auto;">Créer l'enquête</button>
                                    <button type="reset" class="btn btn-danger m-2" data-dismiss="modal">Close</button>
                                </div>
                                
                            </form> 
                        </div>      
                        
                    </div>
                </div>
            </div>


        <!--Fin Modal création Enquete compte-->
            <style>
            .tr-hover:hover{
                background-color:#fff !important;
                cursor: pointer;
            }

            .modal-content{
                    background-image: linear-gradient(45deg, #29323c, #485563);
                }
        </style>
    <script>
        function showDiv1() {
            document.getElementById("div1").style.visibility = "visible";
        }
        setTimeout("showDiv1()", 10000); // aprés 15 sec
    </script>

    @endsection