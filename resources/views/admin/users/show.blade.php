@extends('layouts.dashboard')
@section('title', __('Show user'))
@section('buttons')
@include('admin.partials.buttons', ['id' => $user->id, 'route' => 'users', 'exists' => $user->exists, 'isEdit' => false])
@stop
@section('content')
<div class="card-deck">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">
                    @foreach ($user->roles as $role)
                    <span class="badge badge-dark">{{ $role->name }}</span>
                @endforeach
            </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ __('Attributes') }}</li>
            <li class="list-group-item">{{ $user->id }}</li>
            <li class="list-group-item">{{ true ? __('Active') : __('Inactive') }}</li>
        </ul>
    </div>    
</div>
@stop