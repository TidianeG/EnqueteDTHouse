@extends('layouts.appadmin')
    @section('content')
    <div class="content-wrapper">
            <div class="container-fluid">
                <h4>Sécurité</h4>
                <div class="card" style="">
                    <div class="card-header">
                    @if (session('status'))
                        <div class="alert alert-success p-3">{{ session('status') }}</div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger p-3">{{ session('failed') }}</div>
                    @endif
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
                        <a data-toggle="modal" data-target="#myModal_delete" href="#" class="btn btn-danger">Supprimer le compte</a>
                       
                    </div>

                </div>
            </div>
        </div>

        <!--Debut Modal suppression compte-->
            <div class="modal fade bg-theme" id="myModal_delete">
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
                            <form action="{{route('delete_account')}}" method="post">
                                @csrf
                                <input type="hidden" name="mail" value="">
                                    <button type="submit" class="btn btn-success">Oui</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Non</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!--Fin Modal suppression compte-->

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
                                            <form method="POST" action="">
                                                @csrf

                                                <input type="hidden" name="token" value="">

                                                <div class="row mb-3">
                                                    <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Actuel password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password_old" type="password" class="form-control @error('password') is-invalid @enderror" name="password_old" required autocomplete="old-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Nouveau password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password_new" type="password" class="form-control @error('password') is-invalid @enderror" name="password_new" required autocomplete="new-password">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-start">{{ __('Confirmer password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>

                                                <div class="row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Reset Password') }}
                                                        </button>
                                                    </div>
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
                            <form action="{{ route('update_user_email') }}" method="post">
                            @csrf
                            @method('PATCH')
                                <div class="row">
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label for="inputEmail" class=" ">Email<span style="color:red;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="email" required name="email" id="email" disabled class="form-control input-shadow" value="{{Auth::user()->email}}">
                                            <div class="form-control-position">
                                                <i class="icon-email"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-sm-12 col-md-6">
                                        <label for="inputPassword" class=" ">Confirmer email <span style="color:red;">*</span></label>
                                        <div class="position-relative has-icon-right">
                                            <input type="email" required name="new_email" id="new_email" class="form-control input-shadow" placeholder="new email">
                                            <div class="form-control-position">
                                                <i class="icon-email"></i>
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