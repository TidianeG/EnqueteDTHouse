@extends('layouts.appadmin')

    @section('content')
    <div class="clearfix"></div>
	
    <div class="content-wrapper">
      <div class="container-fluid">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="card profile-card-2">
                    <div class="card-img-block">
                        <img class="img-fluid" src="https://via.placeholder.com/800x500" alt="Card image cap">
                    </div>
                    <div class="card-body pt-5">
                        <img src="{{asset('images/logo1.png')}}" style="background-color:white;" alt="profile-image" class="profile">
                        <h5 class="card-title">{{$validateur->prenom}} {{$validateur->nom}}</h5>
                        <p class="card-text">.</p>
                        <div class="icon-block">
                            <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
                            <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
                            <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                        </div>
                    </div>
    
                </div>
    
            </div>
  
          <div class="col-lg-8">
             <div class="card">
              <div class="card-body">
              <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                  <li class="nav-item">
                      <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                  </li>
                 
                  <li class="nav-item">
                      <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                  </li>
              </ul>
              <div class="tab-content p-3">
                  <div class="tab-pane active" id="profile">
                      <h5 class="mb-3">Profil Super utilisateur</h5>
                      <div class="row">
                          
                          <div class="col-md-12">
                              
                               <div class="table">
                              <table class="table table-hover">
                                  <tbody>                                    
                                      <tr class="row">
                                          <td class="col-sm-7">
                                              Prénom & Nom
                                          </td>
                                          <td class="col-sm-5">
                                              <strong>{{$validateur->prenom}} {{$validateur->nom}}</strong>
                                          </td>
                                      </tr>
                                      <tr class="row">
                                          <td class="col-sm-7">
                                              Date de naissance
                                          </td>
                                          <td class="col-sm-5">
                                              <strong>{{$validateur->naissance}}</strong>
                                          </td>
                                      </tr>
                                      <tr class="row">
                                          <td class="col-sm-7">
                                              Pays dans lequel vous vous trouvez
                                          </td>
                                          <td class="col-sm-5">
                                              <strong>{{$validateur->pays}} </strong>
                                          </td>
                                      </tr>
                                      <tr class="row">
                                          <td class="col-sm-7">
                                              Langue que vous parlez
                                          </td>
                                          <td class="col-sm-5">
                                              <strong>{{$validateur->langue}}</strong>
                                          </td>
                                      </tr>
                                      <tr class="row">
                                          <td class="col-sm-7">
                                              Numéro de téléphone
                                          </td>
                                          <td class="col-sm-5">
                                              <strong>{{$validateur->telephone}} </strong>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                            </div>
                          </div>
                      </div>
                      <!--/row-->
                  </div>
                  <div class="tab-pane" id="edit">
                      <form action="#" method="post">
                        @csrf
                        @method('PATCH')
                          <div class="form-group row">
                              <label class="col-lg-4 col-form-label form-control-label">Prénom</label>
                              <div class="col-lg-8">
                                  <input class="form-control" type="text" id="prenom_edit" name="prenom_edit" value="{{$validateur->prenom}}" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-4 col-form-label form-control-label">Nom</label>
                              <div class="col-lg-8">
                                  <input class="form-control" type="text" name="nom_edit" value="{{$validateur->nom}}" required>
                              </div>
                          </div>
                          
                          <div class="form-group row">
                              <label class="col-lg-4 col-form-label form-control-label">Date de naissance</label>
                              <div class="col-lg-8">
                                  <input class="form-control" type="date" name="naissance_edit" value="{{$validateur->naissance}}" required>
                              </div>
                          </div>
                          
                          <div class="form-group row">
                              <label class="col-lg-4 col-form-label form-control-label">Pays</label>
                              <div class="col-lg-8">
                                <select name="pays_edit"   id="pays" class="form-control input-shadow">
                                    <option value="{{$validateur->pays}}" selected hidden>{{$validateur->pays}} </option>

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
                          
                         
                          <div class="form-group row">
                              <label class="col-lg-4 col-form-label form-control-label">Langue</label>
                              <div class="col-lg-8">
                                <select name="langue_edit" value="{{$validateur->langue}}" id="langue" class="form-control input-shadow">
                                <option value="English">English</option>    
                                <option value="Francais">Francais</option>
                                <option value="{{$validateur->langue}}" selected hidden>{{$validateur->langue}}</option>
                                    
                                </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-4 col-form-label form-control-label">Numéro Telephone</label>
                              <div class="col-lg-8">
                                <input type="tel" required name="phone_edit" id="phone_edit" value="{{$validateur->telephone}}" class="form-control input-shadow" >
                              </div>
                          </div>
                          
                          <div class="form-group row">
                              <label class="col-lg- col-form-label form-control-label"></label>
                              <div class="col-lg-9">
                                  <input type="reset" class="btn btn-secondary" value="Cancel">
                                  <input type="submit" class="btn btn-primary" value="Enregistrer changements">
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
        </div>
        </div>
          
      </div>
  
      <!--start overlay-->
            <div class="overlay toggle-menu"></div>
          <!--end overlay-->
      
      </div>
      <!-- End container-fluid-->
     </div><!--End content-wrapper-->
     <script>
        const phoneInputField = document.querySelector("#phoneT");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        /*document.getElementById('form_register').addEventListener('submit',function(event){
            event.preventDefault();
            const phoneNumber = phoneInput.getNumber();
            phoneInputField.value=phoneNumber;
            document.getElementById('form_register').submit();
        });*/
        
    </script>

    @endsection