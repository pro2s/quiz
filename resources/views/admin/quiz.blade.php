@extends('layouts.dashboard')
@section('title', 'Quiz ' .  $quiz->name)
@section('buttons')
<div class="btn-group mr-2">
    <button class="btn btn-sm btn-outline-secondary">Active</button>
    <button class="btn btn-sm btn-secondary">All</button>
    <button class="btn btn-sm btn-outline-secondary">Inactive</button>
</div>
<button class="btn btn-sm btn-outline-secondary">
    <span data-feather="minus"></span>
    Delete
</button>
@stop
@section('content')
{{ Form::model($quiz, array('route' => array('quiz.update', $quiz->id))) }}
    
{{ Form::close() }}
@endsection