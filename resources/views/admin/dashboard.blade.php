@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">   
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-text">You are logged in!</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">   
            <div class="card">
                <div class="card-header">
                    Quizes
                </div>
                <div class="card-body">
                    <h5 class="card-title">Quizes information</h5>
                    <div class="card-text"></div>
                </div>
            </div>  
        </div>
        <div class="col-md-3">   
            <div class="card">
                <div class="card-header">
                Questions
                </div>
                <div class="card-body">
                <h5 class="card-title">Quizes information</h5>
                <div class="card-text"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">   
            <div class="card">
                <div class="card-header">
                Users
                </div>
                <div class="card-body">
                <h5 class="card-title">Users information</h5>
                <div class="card-text"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
