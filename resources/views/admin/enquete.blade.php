@extends('layouts.appadmin')

    @section('content')
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="d-flex justify-content-between mb-3">
                    <h4>ENQUÊTES</h4>
                    <div>
                        <a class="btn btn-success"  href="{{route('createEnqueteXPEJJDZK89')}}" ><i class="fa-solid fa-plus"></i> Nouvelle Enquete</a>
                    </div>
                </div>
                <div class="card" style="">
                    <div class="card-header">
                        <h5>Liste des ENQUÊTES</h5>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-hover table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Durée</th>
                                    <th class="text-center">Pays</th>
                                    <th class="text-center">Lien enquete</th>
                                    <th class="text-center">Type enquete</th>
                                    <th class="text-center">Nombre Max </th>
                                    <th class="text-center">Etat</th>
                                    <th class="text-center">Cible</th>
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
                                            <td class="text-center">{{$enquete->profession}}</td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
            <style>
            .tr-hover:hover{
                background-color:#fff !important;
                cursor: pointer;
            }
        </style>
    @endsection