@extends('layouts.appadmin')
    @section('content')
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>Liste des messages</h5>
                            </div>
                            <div class="card-body">
                                <table id="datatable" class="table" style="">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Cible</th>
                                            <th class="text-center">Objet</th>
                                            <th class="text-center">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody id="message_table">
                                        @foreach($messages as $message)
                                            <tr>
                                                <td class="text-center">{{$message->created_at}}</td>
                                                <td class="text-center">{{$message->cible}}</td>
                                                <td class="text-center">{{$message->objet}}</td>
                                                <td class="text-center">{{$message->message}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Nouveau mail</h5>
                            </div>
                            <div class="card-body">
                                <form action="/sendmail_user" method="post" id="form_send">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="exampleInputName" class="">Objet <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                            <div class="position-relative has-icon-right">
                                                <input type="text" required name="objet" id="objet" class="form-control input-shadow" placeholder="objet">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="exampleInputName" class="">Cible</label>
                                            <div class="position-relative has-icon-right">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="cible_all" name="cible"  checked value="cible_all">Tous les utilisateurs
                                                    <label class="form-check-label" for="radio1"></label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="cible_multiple" name="cible" value="cible_multiple">Selection multiple
                                                    <label class="form-check-label" for="radio2"></label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="cible_un" name="cible" value="cible_un">Vers un utilisateur
                                                    <label class="form-check-label"></label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div id="email_multiple" style="display:none;">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputName" class="">Pays </label>
                                                    <div class="position-relative has-icon-right">
                                                        <select name="pays" id="pays" class="form-control input-shadow">
                                                            <option value="all" selected="selected">Tous les pays </option>

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
                                                    <label for="exampleInputName" class="">Langue </label>
                                                    <div class="position-relative has-icon-right">
                                                        <select name="langue" id="langue" class="form-control input-shadow">
                                                            <option value="all">Toutes les langues</option>
                                                            <option value="Francais">Francais</option>
                                                            <option value="English">English</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputName" class="">Profession </label>
                                                    <div class="position-relative has-icon-right">
                                                        <select name="profession" id="profession" class="form-control input-shadow">
                                                            <option value="all">Toutes les professions</option>
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
                                                <div class="form-group col-md-6">
                                                    <label for="exampleInputName" class="">Niveau d'étude </label>
                                                    <div class="position-relative has-icon-right">
                                                        <select name="niveau_etude" id="niveau_etude" class="form-control input-shadow">
                                                            <option value="all">Tous niveaux</option>
                                                            <option value="baccalaureat">Baccalauréat</option>
                                                            <option value="Bac+2">Bac+2</option>
                                                            <option value="Bac+3">Bac+3</option>
                                                            <option value="Master">Master</option>
                                                            <option value="Doctorat">Doctorat</option>
                                                            <option value="autre">Autre</option>
                                                        </select>
                                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-7">
                                                    <label for="exampleInputName" class="">Genre </label>
                                                    <div class="position-relative has-icon-right">
                                                        
                                                        <select name="genre" id="genre" class="form-control input-shadow">
                                                            <option value="all">Tous genre</option>
                                                            <option value="masculin">Masculin</option>
                                                            <option value="feminin">Feminin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="email_unique" style="display:none;">
                                            <div class="position-relative has-icon-right">
                                                <input type="email"  name="email_un" id="email_un"  class="form-control input-shadow" placeholder="Email destinataire">
                                                <div class="form-control-position">
                                                    <i class="icon-email"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="exampleInputName" class="">Message <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                            <div class="position-relative has-icon-right " >
                                                <textarea required name="message" id="message" style="width:100%;" rows="10"></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group mt-2">
                                        <input type="reset" class="btn btn-danger" value="Annuler">
                                        <input type="submit" class="btn btn-success" value="Envoyer">
                                    </div>
                                    <div class="spinner-border text-primary" style="display:none;" id="load_send_message" role="status" >
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> API CODE </h4>
                </div>
                <div class="modal-body" id="getCode" style="overflow-x: scroll;">
                    //ajax success content here.
                </div>
                </div>
            </div>
        </div>
    <script>
        let cible_all =      document.getElementById('cible_all');
        let cible_multiple = document.getElementById('cible_multiple');
        let cible_un       = document.getElementById('cible_un');

        let email_unique = document.getElementById('email_unique');
        let email_multiple = document.getElementById('email_multiple');

        //Récupération des données ciblés multiple pour envoyer email en cas de selection l'option email unique
        let pays= document.getElementById('pays');
        let langue= document.getElementById('langue');
        let profession= document.getElementById('profession');
        let genre= document.getElementById('genre');
        let niveau_etude= document.getElementById('niveau_etude');

        //Récupération de l'email en cas de selection l'option email unique
        let email_un= document.getElementById('email_un');

        //Clic pour cocher le bouton envoie à un utilisateur
        cible_un.addEventListener('click', function(){
            if (cible_un.checked) {
                cible_multiple.checked=false;
                cible_all.checked=false;
                email_multiple.style.display='none';
                pays.value="";
                langue.value="";
                profession.value="";
                genre.value="";
                niveau_etude.value="";
                email_un.required=true;

                email_unique.style.display='block';
            } 
        });

        //Clic pour cocher le bouton envoie multiple
        cible_multiple.addEventListener('click', function(){
            if (cible_multiple.checked) {
                cible_un.checked=false;
                cible_all.checked=false;
                email_unique.style.display='none';
                email_multiple.style.display='block';
                email_un.required=false;
            } 
        });

        // Clic pour cocher le bouton Envoyer à tous
        cible_all.addEventListener('click', function(){
            if (cible_all.checked) {
                cible_un.checked=false;
                cible_multiple.checked=false;
                email_unique.style.display='none';
                email_multiple.style.display='none';
                email_un.required=false;
            } 
        });

        /*let form_send = document.getElementById('form_send');
        let load_send_message = document.getElementById('load_send_message');
        form_send.addEventListener('submit', function(e){
            e.preventDefault();
            let donnees_formulaire = $(this).serialize();
            $('#load_send_message').show();
            $.ajax({
                type: "POST",
                url: '/sendmail_user',
                data: donnees_formulaire,
                success: function(data){

                    form_send.reset();
                    load_send_message.style.display='none';
                    
                    //$("#getCodeModal").modal('show');
                    $("#message_table").append(`<tr> <td>#</td> <td> ${data.data.name} </td> <td> <div class="row justify-content-end"> <div class="col"><a href="/categories/${data.data.id}/edit" class="btn btn-primary">Editer</a></div> <form class="col" action="/categories/${data.data.id}" method="post"> <input type="hidden" name="_token" value="{{@csrf_token()}}"> <input type="hidden" name="_method" value="delete">                            <button type="submit" class="btn btn-danger">Suppimer</button> </form> </div> </td> </tr>`);
                    
                }

            });
        });*/

    </script>

    @endsection