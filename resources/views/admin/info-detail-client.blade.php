@extends('layouts.appadmin')
    @section('content')
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mt-3">
                    @if (session('success'))
                        <div class="alert alert-success p-3">{{ session('success') }}</div>
                    @endif        

                    @if (session('error'))
                        <div class="alert alert-danger p-3">{{ session('error') }}</div>
                    @endif
                    <div class="col-lg-4">
                        <div class="card profile-card-2">
                            <div class="card-img-block">
                                <img class="img-fluid" src="https://via.placeholder.com/800x500" alt="Card image cap">
                            </div>
                            <div class="card-body pt-5">
                                <img src="{{asset('images/logo1.png')}}" style="background-color:white;" alt="profile-image" class="profile">
                                <h5 class="card-title">{{$client->prenom}} {{$client->nom}}</h5>
                                <p class="card-text">.</p>
                                <div class="icon-block">
                                    <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
                                    <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
                                    <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                                </div>
                                <div>
                                    @if($user->email_verified)
                                        <div class="m-2">
                                            <a href="{{route('disable_user',$user->id)}}" class="btn btn-danger">Désactiver le compte</a>
                                        </div>
                                    @endif

                                    @if(!$user->email_verified)
                                        <div class="m-2">
                                            <a href="/enable/{{$user->id}}" class="btn btn-success">Activer le compte</a>
                                        </div>
                                    @endif
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
                                        <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-question"></i> <span class="hidden-xs">Enquete & Récompenses</span></a>
                                    </li>
                                </ul>
                                <div class="tab-content p-3">
                                    <div class="tab-pane active" id="profile">
                                        <h5 class="mb-3">Profil Utilisateur</h5>
                                        <div class="row">
                                        
                                            <div class="col-md-12">
                                            
                                                <div class="table">
                                                    <table class="table">
                                                        <tbody>                                    
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Prénom & Nom
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$client->prenom}} {{$client->nom}}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Date de naissance
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$client->naissance}}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Pays dans lequel se trouve l'Utilisateur
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$client->pays}} </strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Langue
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$client->langue}}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Numéro de téléphone
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$client->telephone}} </strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Profession de l'utilisateur
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$client->profession}} </strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Niveau d'étude
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$client->niveau_etude}} </strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="row">
                                                                <td class="col-sm-7">
                                                                    Sexe
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <strong>{{$client->genre}} </strong>
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