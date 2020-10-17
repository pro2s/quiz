@extends('layouts.dashboard')
@section('title', __('Show Question'))
@section('buttons')
@include('admin.partials.buttons', ['id' => $question->id, 'route' => 'questions', 'exists' => $question->exists, 'isEdit' => false])
@stop
@section('content')
<div class="card-deck">
    <div class="card">
        <img class="card-img-top" src="{{ $question->image }}" alt="Question Image">
        <div class="card-body">
            <h5 class="card-title">{{ $question->title }}</h5>
            <p class="card-text">{{ $question->description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ __('Attributes') }}</li>
            <li class="list-group-item">{{ $question->slug }}</li>
            <li class="list-group-item">{{ $question->active ? __('Active') : __('Inactive') }}</li>
        </ul>
    </div>
</div>
@stop
