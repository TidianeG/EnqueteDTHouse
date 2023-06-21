@extends('layouts.appadmin')
    @section('content')
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <div class="card profile-card-2">
                            <div class="card-img-block">
                                <img class="img-fluid" src="https://via.placeholder.com/800x500" alt="Card image cap">
                            </div>
                            <div class="card-body pt-5">
                                <img src="{{asset('images/logo1.png')}}" style="background-color:white;" alt="profile-image" class="profile">
                                <h5 class="card-title">Enquête N° {{$enquete->id}}</h5>
                                <div class="m-2">
                                    <a href="#" class="btn btn-danger">Supprimer l'enquête</a>
                                </div>
                            </div>
                        </div>
            
                    </div>
  
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                                    <li class="nav-item">
                                        <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Enquête</span></a>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content p-3">
                                    <div class="tab-pane active" id="profile">
                                        <h5 class="mb-3">Détail de l'enquête</h5>
                                        <div class="row">
                                        
                                            <div class="col-md-12">
                                            
                                                <div class="table">
                                                    <table class="table">
                                                        <tbody>                                    
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                   Nom enquête
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->nom}}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Durée Enquête
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->duree}} minutes</strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Prix Enquête
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->prix}} FCFA</strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Lien Enquête
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->lien_enquete}}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Type Enquête
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->type_enquete}} </strong>
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Nombre de soumission maximale autorisé
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->nombre_max_enquete}} </strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Type Enquête
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->type_enquete}} </strong>
                                                                </td>
                                                            </tr>
                                                            
                                                            <tr class="row"><td class="col-12 text-center" style="color:red;">Cible</td></tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Niveau Etude
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->niveau_etude}} </strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Personne de sexe
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->sexe}} </strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Personne agé de 
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->age}} </strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Pays
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->pays}} </strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Profession
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$enquete->profession}} </strong>
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
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
          
                </div>
                
            </div>
        </div>
    @endsection