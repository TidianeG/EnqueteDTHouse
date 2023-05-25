@extends('layouts.appuser')
    @section('content')
    <div class="content-wrapper">
            <div class="container-fluid">
                <h4>Sécurité</h4>
                <div class="card" style="">
                    <div class="card-header">
                        <h5>Informations de connexion </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex justify-content-around" style="border-right: 2px solid #fff;">
                                <label for="">Courriel</label>
                                <div>
                                    <label style="text-transform: lowercase;">{{Auth::user()->email}}</label>
                                    <a data-toggle="modal" data-target="#myModalEmail" href="#" class="ml-3 btn btn-primary"><i class="fa fa-edit"></i></a>
                                </div>
                                
                            </div>
                            <div class="col-12 col-md-6 d-flex justify-content-around">
                                <label for="">Mot de passe</label>
                                <div>
                                    <label class="">************</label>
                                    <a data-toggle="modal" data-target="#myModal" href="#" class="ml-3 btn btn-primary"><i class="fa fa-edit"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
                   
                <div class="card" style="">
                    <div class="card-header">
                        <h5>Comptes associés </h5>
                    </div>
                    <div class="card-body">
                        <h5>Statuts</h5>

                    </div>

                </div>

                <div class="card" style="">
                    <div class="card-header">
                        <h5>Supprimer le compte </h5>
                    </div>
                    <div class="card-body">
                        <p style="text-size: 18px !important;">Bien sûr, vous pouvez supprimer votre compte quand vous le souhaitiez et nous respecterons votre décision.</p>
                        <a href="#" class="btn btn-danger">Supprimer le compte</a>
                    </div>

                </div>
            </div>
        </div>

        <!--Debut Modal modifier password-->
            <div class="modal fade bg-theme" id="myModal">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h6>Modification mot de passe</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>                        
                        <!-- Modal body -->
                        <div class="modal-body container">
                            <form action="" method="post">
                            @csrf
                           
                                <div class="row">
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label for="inputEmail" class=" ">Nouveau mot de passe<span style="color:red;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="password" required name="password" id="password" class="form-control input-shadow" placeholder="mot de passe">
                                            <div class="form-control-position">
                                                <i class="icon-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label for="inputPassword" class=" ">Confirmer le mot de passe <span style="color:red;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="password" required name="password" id="password" class="form-control input-shadow" placeholder="mot de passe">
                                            <div class="form-control-position">
                                                <i class="icon-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="">         
                                    <button type="submit" class="btn btn-success">modifier</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>      
                        <!-- Modal footer -->  
                    </div>
                </div>
            </div>
        <!--Fin Modal modifier password-->

        <!--Debut Modal modifier email-->
            <div class="modal fade bg-theme" id="myModalEmail">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h6>Modification Email</h6>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>                        
                        <!-- Modal body -->
                        <div class="modal-body container">
                            <form action="" method="post">
                            @csrf
                           
                                <div class="row">
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label for="inputEmail" class=" ">Email<span style="color:red;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="email" required name="email" id="email" class="form-control input-shadow" placeholder="votre email">
                                            <div class="form-control-position">
                                                <i class="icon-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label for="inputPassword" class=" ">Confirmer email <span style="color:red;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="email" required name="emailconf" id="emailconf" class="form-control input-shadow" placeholder="confirmer email">
                                            <div class="form-control-position">
                                                <i class="icon-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="">         
                                    <button type="submit" class="btn btn-success">modifier</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>      
                        <!-- Modal footer -->  
                    </div>
                </div>
            </div>
        <!--Fin Modal modifier email-->

            <style>
                .modal-content{
                    background-image: linear-gradient(45deg, #29323c, #485563);
                }
            </style>
    @endsection