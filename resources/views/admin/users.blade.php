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
                                    <th class="text-center">Nom</th>
                                    <th class="text-center">Date de naissance</th>
                                    <th class="text-center">Pays</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr class="">
                                        <td class="text-center">{{$client->prenom}}</td>
                                        <td class="text-center">{{$client->nom}}</td>
                                        <td class="text-center">{{$client->naissance}}</td>
                                        <td class="text-center">{{$client->pays}}</td>
                                        <td class="text-center d-flex justify-content-around"><a href="#" class="btn btn-primary"><i class="fa fa-edit"></i></a> <a href="#" class="btn btn-danger"> <i class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                   
                <div class="card" style="">
                    <div class="card-header">
                        <h5>Remarques </h5>
                    </div>
                    <div class="card-body">
                        <h5>Statuts</h5>

                    </div>

                </div>
            </div>
        </div>

        <style>
            tr:hover{
                background-color:#fff !important;
                cursor: pointer;
            }
        </style>
    @endsection