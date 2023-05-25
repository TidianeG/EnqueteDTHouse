@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-responsive table-spired">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Id_String</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($response as $i=>$res)
                                <tr>
                                    <td>{{$res->id}}</td>
                                    <td>{{$res->id_string}}</td>
                                    <td>{{$res->title}}</td>
                                    <td>{{$res->description}}</td>
                                    <td>{{$res->url}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
