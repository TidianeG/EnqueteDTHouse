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
                    <h4>Validateurs</h4>
                    <div>
                        <a class="btn btn-success"  href="#" data-toggle="modal" data-target="#modal_create_validateur"  ><i class="fa-solid fa-plus"></i> Nouveau validateur</a>
                    </div>
                </div>
                <div class="card" style="">
                    <div class="card-header">
                        <h5>Liste des Validateurs</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table  table-hover " style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Téléphone</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Pays</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($validateurs as $user)
                                    <tr class="tr-hover" id="row_validateur">
                                        <td class="text-center">{{$user->validateur->prenom}}</td>
                                        <td class="text-center">{{$user->validateur->telephone}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td class="text-center">{{$user->validateur->pays}}</td>
                                        <td class="text-center d-flex justify-content-around"> 
                                            <a href="{{route('info_detail_validateur',$user->validateur->id)}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                
            </div>
        </div>

        <div class="modal fade bg-theme" id="modal_create_validateur">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                                            
                    <!-- Modal body -->
                    <div class="modal-body container">
                                        @if (session('error'))
                                            <div class="alert alert-danger p-3">{{ session('error') }}</div>
                                        @endif
                                    <div class="text-center">
                                        <img src="{{asset('images/logo2.png')}}" alt="logo icon">
                                    </div>
                                    <div class="card-title text-uppercase text-center py-3">Nouveau Validateur</div>
                                    <form  action="#" method="post" id="form_validateur">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputName" class="">Prénom <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                                <div class="position-relative has-icon-right">
                                                    <input type="text" required name="prenom" id="prenom" class="form-control input-shadow" placeholder="Enter votre nom">
                                                    <div class="form-control-position">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputName" class="">Nom <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                                <div class="position-relative has-icon-right">
                                                    <input type="text" required name="nom" id="nom" class="form-control input-shadow" placeholder="Enter voter prénom">
                                                    <div class="form-control-position">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputName" class="">Date de Naissance <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                                <div class="position-relative has-icon-right">
                                                    <input type="date" required name="naissance" id="naissance" class="form-control input-shadow" >
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputName" class="">Email <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                                <div class="position-relative has-icon-right">
                                                    <input type="email" required name="email" id="email" class="form-control input-shadow" placeholder="Entrer votre mail">
                                                    <div class="form-control-position">
                                                        <i class="icon-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label for="exampleInputName" class="">Téléphone <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                                <div class="position-relative has-icon-right">
                                                    <input type="tel" required name="phone" id="phone" class="form-control input-shadow" >
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
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
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputName" class="">Langue <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                                <div class="position-relative has-icon-right">
                                                    <select name="langue" id="langue" class="form-control input-shadow">
                                                        <option value="Francais">Francais</option>
                                                        <option value="English">English</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="exampleInputName" class="">Role <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                                <div class="position-relative has-icon-right">
                                                    <select name="role[]" id="role" size="3" class="form-control input-shadow" multiple>
                                                        <option value="validateur">Validateur d'enquête</option>
                                                        <option value="createur">Créateur d'enquête</option>
                                                        <option value="supprimer">Supprimer une enquête</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputName" class="">Mot de passe <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                                <div class="position-relative has-icon-right">
                                                    <input type="password" required name="password" id="password" class="form-control input-shadow" placeholder="mot de passe">
                                                    <div class="form-control-position">
                                                        <i class="icon-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="exampleInputName" class="">Cofirmer mot de passe <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                                                <div class="position-relative has-icon-right">
                                                    <input type="password" required name="confirm_password" id="confirm_password" class="form-control input-shadow" placeholder="confirmer votre mot passe">
                                                    <div class="form-control-position">
                                                        <i class="icon-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="icheck-material-white">
                                                <input type="checkbox" name="sendmail" id="user-checkbox" value="true" checked="" />
                                                <label for="user-checkbox">Envoyer les identifant par mail </label>
                                            </div>
                                        </div>
                                        <div class="alert p-3" id="info_submit" style="display:none;">

                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-light btn-block waves-effect waves-light" style="width: 50%;">Enregistrer</button>
                                        </div>
                                        <div class="spinner-border text-primary" style="display:none;" id="load_send_message" role="status" >
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    
                                    </form>
                    </div>
                </div>
            </div>
        </div>

         <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
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
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        let form_validateur = document.getElementById('form_validateur');
        let load_send_message = document.getElementById('load_send_message');
        let info_submit = document.getElementById('info_submit');
        form_validateur.addEventListener('submit', function(e){
            e.preventDefault();
            let donnees_formulaire = $(this).serialize();
            $('#load_send_message').show();
            $.ajax({
                type: "POST",
                url: '/saveValidateur',
                data: donnees_formulaire,
                success: function(data){
                    //console.log(data['status']);
                    if (data['status']=='phone error') {
                        $('#info_submit').text('Le numéro de téléphone est lié à un autre compte. Veuiller utilisé un autre numéro.')
                        $('#info_submit').addClass('alert-danger');
                        $('#info_submit').show();
                        load_send_message.style.display='none';
                        console.log(data);
                                console.log(data.data.prenom);
                                console.log(data['nom']);
                    }
                    else{
                        if (data['status']=='email error') {
                            $('#info_submit').text('L\'email est lié à un autre compte. Veuiller utilisé un autre email.')
                            $('#info_submit').addClass('alert-danger');
                            $('#info_submit').show();
                            load_send_message.style.display='none';
                            console.log(data);
                            console.log(data.data.prenom);
                            console.log(data['nom']);
                        }
                        else{
                            if (data['status']=='success') {
                                $('#info_submit').text('Utilisateur ajouté avec succès. Les identifiants de connexion envoyés')
                                $('#info_submit').removeClass('alert-danger');
                                $('#info_submit').addClass('alert-success');
                                $('#info_submit').show();
                                form_validateur.reset();
                                load_send_message.style.display='none';
                                console.log(data);
                                console.log(data.prenom);
                                console.log(data['nom']);
                                $("#modal_create_validateur").modal('hide');
                                $("#row_validateur").append(`<tr> <td class="text-center">${data.data.prenom}</td> <td class="text-center"> ${data.data.phone} </td> <td class="text-center"> ${data.data.email}</td>  <td class="text-center"> ${data.data.pays}</td></tr>`);
                            
                            }
                            else{
                                $('#info_submit').text('Erreur d\'enregistrement. Veuiller vérifier les données entrer');
                                $('#info_submit').addClass('alert-danger');
                                $('#info_submit').show();
                                load_send_message.style.display='none';
                                console.log(data);
                                console.log(data.prenom);
                                console.log(data['nom']);
                            }
                        }
                    }
                    //form_validateur.reset();
                    //load_send_message.style.display='none';
                    //$("#getCode").html(data);
                    //$("#modal_create_validateur").modal('hide');
                    //$("#message_table").append(`<tr> <td>#</td> <td> ${data.data.name} </td> <td> <div class="row justify-content-end"> <div class="col"><a href="/categories/${data.data.id}/edit" class="btn btn-primary">Editer</a></div> <form class="col" action="/categories/${data.data.id}" method="post"> <input type="hidden" name="_token" value="{{@csrf_token()}}"> <input type="hidden" name="_method" value="delete">                            <button type="submit" class="btn btn-danger">Suppimer</button> </form> </div> </td> </tr>`);
                    
                }

            });
        });
        
    </script>

            
    

    @endsection