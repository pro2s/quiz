@extends('layouts.dashboard')
@section('title', __('Show Quiz'))
@section('buttons')
@include('admin.partials.buttons', ['id' => $quiz->id, 'route' => 'quizzes', 'exists' => $quiz->exists, 'isEdit' => false])
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
            @foreach ($quiz->questions as $question)
                <li class="list-group-item {{ $question->active ? '': 'disabled' }}">{{ $question->title }}</li>
            @endforeach
        </ul>
    </div>    
</div>
@stop