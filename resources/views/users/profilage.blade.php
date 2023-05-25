@extends('layouts.appuser')
    @section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            @if($profilage)
                <div class="container">
                    <form >
                        
                        <div class="">
                            <h5  class="">1. Pouvez-vous décrire la région dans laquelle vous résidez actuellement ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionregion}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">2. Combien de personnes vivent dans votre ménage (vous y compris) ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionpersonnemenage}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">3. Quel est votre état civil ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionetatcivil}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">4. Vous considérez-vous comme le principal acheteur de produits alimentaires de votre foyer ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionacheteproduit}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">5. Qu'est-ce qui décrit le mieux votre logement ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionlogement}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">6. Combien d'enfants de moins de 18 ans vivent dans votre ménage ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionnbreenfant}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">7. Parmi les appareils ménagers suivants, lesquels possédez-vous ou avez-vous dans votre ménage ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionappareilmenager}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">8. Quel est votre niveau d'éducation ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionniveaueducation}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        
                        <div class="">
                            <h5  class="">9. Lequel des éléments suivants décrit le mieux votre situation professionnelle</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionsituationprofe}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">10. Dans quel service travaillez-vous principalement au sein de votre entreprise ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionservice}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">11. Laquelle des options suivantes correspond au mieux à votre téléphone portable personnel ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optiontelephone}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">12. Avez-vous accès à une voiture ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionvoiture}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">13-Avez-vous déjà voyagé en avion et dans quel but ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionvoyage}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">14. Parmi les produits électroniques suivants, quels sont ceux que vous possédez ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionproduitselectro}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">15. Parmi les boissons suivantes, lesquelles consommez-vous régulièrement ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionboisson}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">16. Avez-vous déjà emprunté un prêt auprès d'une société de microfinance et/ou d'une banque ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionempruntepret}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">17. Fumez-vous ? Veuillez indiquer à quelle fréquence.</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionfrequencefume}}</h6>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">18. Êtes-vous un électeur inscrit ?</h5>
                            <div class="form-check">
                                <h6>{{$profilage->optionelecteur}}</h6>
                            </div>
                            </div>
                        <hr>
                        <div class="form-group mt-5">
                            
                            <input type="submit" class="btn btn-primary" value="Modifier">
                        </div>
                    </form>
                </div>
            @endif

            @if(!$profilage)
                <div class="container">
                    <form action="{{route('save_profilage')}}" method="post">
                        @csrf
                        <div class="">
                            <h5  class="">1. Pouvez-vous décrire la région dans laquelle vous résidez actuellement ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioregion1" name="optionregion" value="Urbaine" checked>Urbaine
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioregion2" name="optionregion" value="Périurbaine">Périurbaine
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioregion3" name="optionregion" value="Rurale">Rurale
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">2. Combien de personnes vivent dans votre ménage (vous y compris) ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiopersonnemenage1" name="optionpersonnemenage" value="1" checked>1
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiopersonnemenage2" name="optionpersonnemenage" value="2">2
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiopersonnemenage3" name="optionpersonnemenage" value="3">3
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiopersonnemenage4" name="optionpersonnemenage" value="4">4
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiopersonnemenage5" name="optionpersonnemenage" value="5">5
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiopersonnemenage6" name="optionpersonnemenage" value="plus de 5">Plus de 5
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">3. Quel est votre état civil ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioetatcivil1" name="radioetatcivil" value="Célibataire" checked>Célibataire
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioetatcivil2" name="radioetatcivil" value="Marié(e)">Marié(e)
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioetatcivil3" name="radioetatcivil" value="Divorcé(e)">Divorcé(e)
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioetatcivil4" name="radioetatcivil" value="Vis en couple/Union civile">Vis en couple/Union civile
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioetatcivil5" name="radioetatcivil" value="Séparé(e)">Séparé(e)
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioetatcivil6" name="radioetatcivil" value="Veuf(ve)">Veuf(ve)
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioetatcivil7" name="radioetatcivil" value="Préfère ne pas répondre">Préfère ne pas répondre
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">4. Vous considérez-vous comme le principal acheteur de produits alimentaires de votre foyer ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioacheteproduit1" name="optionacheteproduit" value="Oui" checked>Oui
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioacheteproduit2" name="optionacheteproduit" value="Nous partageons la responsabilité des achats">Nous partageons la responsabilité des achats
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioacheteproduit3" name="optionacheteproduit" value="Non">Non
                                <label class="form-check-label"></label>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">5. Qu'est-ce qui décrit le mieux votre logement ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="logement1" name="logement" value="Propriétaire" checked>Propriétaire
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="logement2" name="logement" value="Locataire">Locataire
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="logement3" name="logement" value="Vis avec des membres de ma famille ">Vis avec des membres de ma famille 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="logement4" name="logement" value="Vis dans un logement étudiant/universitaire">Vis dans un logement étudiant/universitaire  
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="logement5" name="logement" value="Autre">Autre
                                <label class="form-check-label"></label>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">6. Combien d'enfants de moins de 18 ans vivent dans votre ménage ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radionbreenfant1" name="radionbreenfant" value="Aucun" checked>Aucun
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radionbreenfant2" name="radionbreenfant" value="1">1
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radionbreenfant3" name="radionbreenfant" value="2">2
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radionbreenfant4" name="radionbreenfant" value="3">3 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radionbreenfant5" name="radionbreenfant" value="4 ou plus">4 ou plus
                                <label class="form-check-label"></label>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">7. Parmi les appareils ménagers suivants, lesquels possédez-vous ou avez-vous dans votre ménage ?</h5>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager1" name="appareilmenager[]" value="Climatiseur/Purificateur d'air" checked>Climatiseur/Purificateur d'air 
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager2" name="appareilmenager[]" value="Lave-vaisselle ">Lave-vaisselle 
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager3" name="appareilmenager[]" value="Chaudière à eau électrique/Bouilloire">Chaudière à eau électrique/Bouilloire 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager4" name="appareilmenager[]" value="Ventilateur électrique">Ventilateur électrique  
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager5" name="appareilmenager[]" value="Feu/Chauffage au gaz">Feu/Chauffage au gaz 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager6" name="appareilmenager[]" value="Sèche-cheveux/Fer à repasser/Lisseur">Sèche-cheveux/Fer à repasser/Lisseur
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager7" name="appareilmenager[]" value="Humidificateur/Déshumidificateur">Humidificateur/Déshumidificateur 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager8" name="appareilmenager[]" value="Four/Micro-ondes">Four/Micro-ondes   
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager9" name="appareilmenager[]" value="Réfrigérateur">Réfrigérateur 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager10" name="appareilmenager[]" value="Machine à coudre">Machine à coudre 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager11" name="appareilmenager[]" value="Haut-parleur/Amplificateur/Home cinéma/Hi-Fi">Haut-parleur/Amplificateur/Home cinéma/Hi-Fi 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager12" name="appareilmenager[]" value="Télévision">Télévision 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager13" name="appareilmenager[]" value="Grille-pain">Grille-pain
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager14" name="appareilmenager[]" value="Aspirateur/Robot aspirateur">Aspirateur/Robot aspirateur
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager15" name="appareilmenager[]" value="Lave-linge">Lave-linge 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager16" name="appareilmenager[]" value="Distributeur d'eau/Purificateur d'eau">Distributeur d'eau/Purificateur d'eau 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="appareilmenager17" name="appareilmenager[]" value="Aucun des appareils précités">Aucun des appareils précités 
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">8. Quel est votre niveau d'éducation ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioniveaueducation1" name="radioniveaueducation" value="Aucun complet" checked>Aucun complet 
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioniveaueducation2" name="radioniveaueducation" value="École primaire">École primaire 
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioniveaueducation3" name="radioniveaueducation" value="École secondaire">École secondaire 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioniveaueducation4" name="radioniveaueducation" value="Lycée">Lycée
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioniveaueducation5" name="radioniveaueducation" value="Collège tertiaire/technique">Collège tertiaire/technique
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioniveaueducation6" name="radioniveaueducation" value="Université/Enseignement supérieur">Université/Enseignement supérieur
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioniveaueducation7" name="radioniveaueducation" value="Études supérieures">Études supérieures 
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="">
                            <h5  class="">9. Lequel des éléments suivants décrit le mieux votre situation professionnelle</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiosituprof1" name="radiosituprof" value="Étudiant" checked>Étudiant 
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiosituprof2" name="radiosituprof" value="Travail à temps plein">Travail à temps plein
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiosituprof3" name="radiosituprof" value="Temps partiel/Travail contractuel">Temps partiel/Travail contractuel 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiosituprof4" name="radiosituprof" value="Travailleur indépendant/Propriétaire d'une entreprise">Travailleur indépendant/Propriétaire d'une entreprise
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiosituprof5" name="radiosituprof" value="À la retraite">À la retraite 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiosituprof6" name="radiosituprof" value="Personne au foyer/Parent restant au foyer">Personne au foyer/Parent restant au foyer
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiosituprof7" name="radiosituprof" value="Au chômage">Au chômage 
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">10. Dans quel service travaillez-vous principalement au sein de votre entreprise ? (Champ de compétences)</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice1" name="radioservice" value="Administration/Personnel général" checked>Administration/Personnel général 
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice2" name="radioservice" value="Ressources humaines">Ressources humaines
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice3" name="radioservice" value="Finances/Comptabilité">Finances/Comptabilité 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice4" name="radioservice" value="Informatique">Informatique
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice5" name="radioservice" value="Marketing">Marketing 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice6" name="radioservice" value="Juridique/Droit">Juridique/Droit
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice7" name="radioservice" value="Autre">Autre 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice8" name="radioservice" value="Service à la clientèle">Service à la clientèle 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice9" name="radioservice" value="Opérations">Opérations 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice10" name="radioservice" value="Ventes/Développement des affaires">Ventes/Développement des affaires 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice11" name="radioservice" value="Approvisionnement">Approvisionnement 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice12" name="radioservice" value="Direction exécutive">Direction exécutive 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice13" name="radioservice" value="Ingénierie">Ingénierie 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radioservice14" name="radioservice" value="Je ne travaille pas">Je ne travaille pas 
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">11. Laquelle des options suivantes correspond au mieux à votre téléphone portable personnel ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiotelephone1" name="radiotelephone" value="Smartphone (iOS, Android, Windows, Symbian, etc.)" checked>Smartphone (iOS, Android, Windows, Symbian, etc.) 
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiotelephone2" name="radiotelephone" value="Téléphone de base (téléphones à fonctionnalités limitées ou sans applications)">Téléphone de base (téléphones à fonctionnalités limitées ou sans applications)
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiotelephone3" name="radiotelephone" value="Autre">Autre 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiotelephone4" name="radiotelephone" value="Je n'ai pas de téléphone portable">Je n'ai pas de téléphone portable
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">12. Avez-vous accès à une voiture ?</h5>
                            
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiovoiture1" name="radiovoiture" value="Je possède une/des voiture(s)" checked>Je possède une/des voiture(s)
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiovoiture2" name="radiovoiture" value="Je loue/possède une voiture de société">Je loue/possède une voiture de société 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiovoiture3" name="radiovoiture" value="J'ai accès à une voiture/des voitures">J'ai accès à une voiture/des voitures 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiovoiture4" name="radiovoiture" value="Non. Je n'ai pas accès à une voiture">Non. Je n'ai pas accès à une voiture 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiovoiture5" name="radiovoiture" value="Préfère ne pas répondre">Préfère ne pas répondre
                                <label class="form-check-label"></label>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">13-Avez-vous déjà voyagé en avion et dans quel but ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiovoyage1" name="voyage" value="Affaires" checked>Affaires 
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiovoyage2" name="voyage" value="Loisirs">Loisirs
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiovoyage3" name="voyage" value="Les deux, loisirs et affaires">Les deux, loisirs et affaires 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radiovoyage4" name="voyage" value="Ni l'un ni l'autre, je n'ai jamais voyagé en avion">Ni l'un ni l'autre, je n'ai jamais voyagé en avion
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">14. Parmi les produits électroniques suivants, quels sont ceux que vous possédez ? (Sélectionnez tout ce qui s'applique)</h5>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro1" name="produitsElectro[]" value="Lecteur Blu-ray/DVD" checked>Lecteur Blu-ray/DVD 
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro2" name="produitsElectro[]" value="Télévision à écran plat">Télévision à écran plat 
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro3" name="produitsElectro[]" value="Télévision par câble/satellite">Télévision par câble/satellite
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro4" name="produitsElectro[]" value="Scanner">Scanner  
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro5" name="produitsElectro[]" value="Console de jeu portable (par exemple, Sony PS Vita)">Console de jeu portable (par exemple, Sony PS Vita) 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro6" name="produitsElectro[]" value="Récepteur de télévision numérique">Récepteur de télévision numérique
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro7" name="produitsElectro[]" value="Télévision 3D">Télévision 3D 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro8" name="produitsElectro[]" value="Console de jeu stationnaire (par exemple, Nintendo Wii)">Console de jeu stationnaire (par exemple, Nintendo Wii)   
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro9" name="produitsElectro[]" value="Imprimante">Imprimante 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro10" name="produitsElectro[]" value="Téléphone portable">Téléphone portable
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro11" name="produitsElectro[]" value="Caméra vidéo/Caméscope">Caméra vidéo/Caméscope 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro12" name="produitsElectro[]" value="Appareil photo numérique">Appareil photo numérique 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro13" name="produitsElectro[]" value="PC/Mac stationnaire ou de bureau">PC/Mac stationnaire ou de bureau
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro14" name="produitsElectro[]" value="PC/Mac portable">PC/Mac portable
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro15" name="produitsElectro[]" value="Lecteur MP3/iPod">Lecteur MP3/iPod
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro16" name="produitsElectro[]" value="Projecteur">Projecteur
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro17" name="produitsElectro[]" value="Imprimante polyvalente (fax, imprimante, téléphone, etc.)">Imprimante polyvalente (fax, imprimante, téléphone, etc.) 
                                <label class="form-check-label"></label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro18" name="produitsElectro[]" value="Réseau domestique/Internet sans fil">Réseau domestique/Internet sans fil 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro19" name="produitsElectro[]" value="Son multicanal/Cinéma à domicile">Son multicanal/Cinéma à domicile
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro20" name="produitsElectro[]" value="Récepteur de médias numériques (par exemple, Apple TV, Vudu)">Récepteur de médias numériques (par exemple, Apple TV, Vudu)
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro21" name="produitsElectro[]" value="Tablette (par exemple, iPad)">Tablette (par exemple, iPad)
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro22" name="produitsElectro[]" value="Lecteur de livres électroniques (par exemple, Kindle)">Lecteur de livres électroniques (par exemple, Kindle)
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro23" name="produitsElectro[]" value="Télévision intelligente">Télévision intelligente
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="produitsElectro24" name="produitsElectro[]" value="Aucun des appareils précités">Aucun des appareils précités
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">15. Parmi les boissons suivantes, lesquelles consommez-vous régulièrement ?</h5>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson1" name="boissons[]" value="Café" checked>Café
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson2" name="boissons[]" value="Boissons non alcoolisées régulières">Boissons non alcoolisées régulières
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson3" name="boissons[]" value="Boissons gazeuses diététiques">Boissons gazeuses diététiques
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson4" name="boissons[]" value="Boissons énergétiques">Boissons énergétiques  
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson5" name="boissons[]" value="Eau en bouteille">Eau en bouteille 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson6" name="boissons[]" value="Jus">Jus
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson7" name="boissons[]" value="Bière nationale">Bière nationale
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson8" name="boissons[]" value="Bière importée">Bière importée  
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson9" name="boissons[]" value="Vin (rouge, blanc, mousseux, etc.)">Vin (rouge, blanc, mousseux, etc.) 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson10" name="boissons[]" value="Champagne">Champagne
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson11" name="boissons[]" value="Cocktails">Cocktails 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson12" name="boissons[]" value="Liqueur aromatisée (par exemple, absinthe, amers)">Liqueur aromatisée (par exemple, absinthe, amers) 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson13" name="boissons[]" value="Whisky/Scotch/Bourbon">Whisky/Scotch/Bourbon
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson14" name="boissons[]" value="Vodka">Vodka
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson15" name="boissons[]" value="Rhum">Rhum
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson16" name="boissons[]" value="Tequila">Tequila
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson17" name="boissons[]" value="Imprimante polyvalente (fax, imprimante, téléphone, etc.)">Imprimante polyvalente (fax, imprimante, téléphone, etc.) 
                                <label class="form-check-label"></label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson18" name="boissons[]" value="Cognac">Cognac 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson19" name="boissons[]" value="Brandy">Brandy
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson20" name="boissons[]" value="Port/Vin fortifié">Port/Vin fortifié
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson21" name="boissons[]" value="Cidres">Cidres
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="radioboisson22" name="boissons[]" value="Aucun des appareils précités">Aucun des appareils précités
                                <label class="form-check-label"></label>
                            </div>

                            
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">16. Avez-vous déjà emprunté un prêt auprès d'une société de microfinance et/ou d'une banque ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="emprunte1" name="emprunte" value="Affaires" checked>Non, je ne l'ai pas fait. 
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="emprunte2" name="emprunte" value="Oui, j'ai emprunté un pour mon usage personnel">Oui, j'ai emprunté un pour mon usage personnel
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="emprunte3" name="emprunte" value="Oui, j'ai emprunté un pour un usage professionnel">Oui, j'ai emprunté un pour un usage professionnel 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="emprunte4" name="emprunte" value="Oui, j'ai emprunté un pour mon usage personnel et professionnel">Oui, j'ai emprunté un pour mon usage personnel et professionnel
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="emprunte5" name="emprunte" value="Pas encore, mais j'ai l'intention d'emprunter un à l'avenir">Pas encore, mais j'ai l'intention d'emprunter un à l'avenir 
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="emprunte6" name="emprunte" value="Je préfère ne pas répondre">Je préfère ne pas répondre
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">17. Fumez-vous ? Veuillez indiquer à quelle fréquence.</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="frequencefume1" name="frequencefume" value="Je ne fume pas" checked>Je ne fume pas
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="frequencefume2" name="frequencefume" value="Moins d'un paquet de cigarettes par semaine">Moins d'un paquet de cigarettes par semaine
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="frequencefume3" name="frequencefume" value="Moins d'un paquet de cigarettes par jour">Moins d'un paquet de cigarettes par jour
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="frequencefume4" name="frequencefume" value="Un ou deux paquets de cigarettes par jour">Un ou deux paquets de cigarettes par jour
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="frequencefume5" name="frequencefume" value="Plus de deux paquets de cigarettes par jour">Plus de deux paquets de cigarettes par jour
                                <label class="form-check-label"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="frequencefume6" name="frequencefume" value="Je préfère ne pas répondre">Je préfère ne pas répondre
                                <label class="form-check-label"></label>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h5  class="">18. Êtes-vous un électeur inscrit ?</h5>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="electeurinscrit1" name="electeurinscrit" value="Oui, je suis un électeur inscrit" checked>Oui, je suis un électeur inscrit
                                <label class="form-check-label" for="radio1"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="electeurinscrit2" name="electeurinscrit" value="Non, je ne suis pas un électeur inscrit">Non, je ne suis pas un électeur inscrit
                                <label class="form-check-label" for="radio2"></label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="electeurinscrit3" name="electeurinscrit" value="Je préfère ne pas répondre">Je préfère ne pas répondre
                                <label class="form-check-label"></label>
                            </div>
                            
                            
                        </div>
                        <hr>
                        <div class="form-group mt-5">
                            <input type="reset" class="btn btn-danger" value="Annuler">
                            <input type="submit" class="btn btn-success" value="Enregistrer">
                        </div>
                    </form>
                </div>
                
            @endif
            <style>
                
            </style>
        </div>
    </div>
        
    @endsection