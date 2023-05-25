@extends('layouts.appadmin')
    @section('content')
    <div class="clearfix"></div>
	
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                      {{ session('error') }}
                    </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                </div>
            </div>
        </div>
    </div>
    @endsection