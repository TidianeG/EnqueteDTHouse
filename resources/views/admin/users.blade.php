@extends('layouts.appadmin')

    @section('content')
        <div class="content-wrapper">
            <div class="container-fluid">
                <h4>Clients</h4>
                <div class="card" style="">
                    <div class="card-header">
                        <h5>Liste des clients</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Prénom</th>
                                    <th class="text-center">Date de naissance</th>
                                    <th class="text-center">Pays</th>
                                    <th class="text-center">Etat du compte</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="ligne-client">
                                        <td class="text-center">{{$user->client->prenom}} {{$user->client->nom}}</td>
                                        <td class="text-center">{{$user->client->naissance}}</td>
                                        <td class="text-center">{{$user->client->pays}}</td>
                                        @if($user->email_verified)
                                            <td class="text-center" style="color:green;">activé</td>
                                        @endif
                                        @if(!$user->email_verified)
                                            <td class="text-center">desactivé</td>
                                        @endif
                                        <td class="text-center d-flex justify-content-around">
                                            <a href="{{route('info_detail_client',$user->client->id)}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                                            <a data-toggle="modal" data-target="#myModal_delete_user" href="#" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                   
                
            </div>
        </div>
        <!--Debut Modal suppression compte-->
            <div class="modal fade bg-theme" id="myModal_delete_user">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h6>Supression compte</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>                        
                        <!-- Modal body -->
                        <div class="modal-body container">
                        <p style="text-size: 18px !important;">Voulez-vous supprimer le compte?</p>
                              
                        </div>      
                        <!-- Modal footer -->  
                        <div class="modal-footer">
                            <form action="#" method="post">
                                @csrf
                                <input type="hidden" name="mail" value="">
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Non</button>
                                    <button type="submit" class="btn btn-success">Oui</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!--Fin Modal suppression compte-->
        <style>
            .ligne-client:hover{
                background-color:#fff !important;
                cursor: pointer;
            }
            .modal-content{
                    background-image: linear-gradient(45deg, #29323c, #485563);
                }
        </style>
    @endsection