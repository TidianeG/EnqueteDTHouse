@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Activation compte') }}</div>

                @if (session('success'))
                    <div class="alert alert-success p-3">{{ session('success') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
