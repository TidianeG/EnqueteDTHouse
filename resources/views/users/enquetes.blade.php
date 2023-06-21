@extends('layouts.appuser')
    @section('content')
        <div class="content-wrapper">
            <div class="container-fluid">
                <h4>Enquêtes</h4>
                <div class="card" style="">
                <div class="card-header">
                    <h5>Enquêtes disponibles</h5>
                </div>
                    <div class="card-body">
                        
                        <table id="datatable" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Durée de l’enquête (en minutes)</th>
                                    <th class="text-center">Récompense</th>
                                    <th class="text-center">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enquetes as $enquete)
                                    <tr>
                                        <td class="text-center">{{$enquete->duree}}</td>
                                        <td class="text-center">{{$enquete->prix}}</td>
                                        <td class="text-center"><a href="{{$enquete->lien_enquete}}" target="_blank" class="btn btn-success">Commencer l’enquête</a></td>
                                        
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                </div>
                        
            </div>
            
        </div>
        
    @endsection