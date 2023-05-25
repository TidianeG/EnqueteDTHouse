@extends('layouts.appuser')
    @section('content')
        <div class="content-wrapper">
            <div class="container-fluid">
                <h4>Récompenses</h4>
                <div class="card" style="">
                    <div class="card-header">
                        <h5>Aperçu des Récompenses </h5>
                    </div>
                    <div class="card-body">
                        
                        <table id="datatable" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center">Montant (FCFA)</th>
                                    <th class="text-center">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">19-02-2023</td>
                                    <td class="text-center">Service</td>
                                    <td class="text-center">1000 FCFA</td>
                                    <td class="text-center">En attente</td>
                                </tr>
                                <tr>
                                <td class="text-center">20-02-2023</td>
                                    <td class="text-center">Enquête</td>
                                    <td class="text-center">2000 FCFA</td>
                                    <td class="text-center">Approuvé</td>
                                </tr>
                                <td class="text-center">21-02-2023</td>
                                    <td class="text-center">Vente</td>
                                    <td class="text-center">500 FCFA</td>
                                    <td class="text-center">Non approuvé</td>
                                </tr>
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
    @endsection