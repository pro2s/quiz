@extends('layouts.dashboard')
@section('title', __('Show Quiz'))
@section('buttons')
<a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('quizzes.index') }}">
    <span data-feather="corner-left-up"></span>
    {{ __('Back') }}
</a>
<a class="btn btn-sm btn-outline-success mr-2" href="{{route('quizzes.edit', $quiz->id)}}">
    <span data-feather="edit-3"></span>
    {{ __('Edit') }}
</a>
<button class="btn btn-sm btn-outline-danger mr-2">
    <span data-feather="minus"></span>
    {{ __('Delete') }}
</button>
@stop
@section('content')
<div class="card-deck">
    <div class="card">
        <img class="card-img-top" src="{{ $quiz->image }}">
        <div class="card-body">
            <h5 class="card-title">{{ $quiz->name }}</h5>
            <p class="card-text">{{ $quiz->description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ __('Attributes') }}</li>
            <li class="list-group-item">{{ $quiz->slug }}</li>
            <li class="list-group-item">{{ $quiz->active ? __('Active') : __('Inactive') }}</li>
            <li class="list-group-item">{{ $quiz->started_at ?? __('Already started') }}</li>
            <li class="list-group-item">{{ $quiz->ended_at ?? __('Infinite') }}</li>
            <li class="list-group-item">{{ $quiz->created_at ?? __('Never') }}</li>
            <li class="list-group-item">{{ $quiz->updated_at ?? __('Never') }}</li>
        </ul>
    </div>    
    <div class="card">
        <div class="card-header">{{ __('Questions') }}</div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"></li>
        </ul>
    </div>    
</div>
@endsection