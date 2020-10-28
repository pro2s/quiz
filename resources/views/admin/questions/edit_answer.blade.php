@extends('layouts.dashboard')
@section('title', 'Answer to Question ' .  $question->title)
@section('buttons')
<a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('questions.edit', $question->id) }}">
    @icon("corner-left-up")
    {{ __('Back') }}
</a>
@stop
@section('content')
@if( $answer->exists )
<form method="post" action="{{ route('questions.answers.update', [$question->id, $answer->id]) }}" enctype="multipart/form-data">
    @method('PUT')
@else
<form method="post" action="{{ route('questions.answers.store', $question->id) }}" enctype="multipart/form-data">
@endif
    @csrf
    <div class="form-group">
        <label for="answer">{{ __('Answer') }}</label>
        <input type="text" class="form-control @iiclass('answer')" name="answer" id="answer" value="{{ $answer->answer ?? old('answer') }}" placeholder="{{ __('Enter answer') }}">
        <div class="invalid-feedback">{{ $errors->first('answer') ?? "" }}</div>
    </div>
    <div class="form-group">
        <label for="image">{{ __('Image') }}</label>
        <input type="url" class="form-control" name="image" id="image" value="{{ $answer->image ?? old('image') }}" placeholder="{{ __('Enter image url') }}">
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="active" id="active" {{ ($answer->active ?? old('active')) ? 'checked="checked"' : '' }}>
        <label class="custom-control-label" for="active">{{ __('Active') }}</label>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="correct" id="correct" {{ ($question->correct ?? old('correct')) ? 'checked="checked"' : '' }}>
        <label class="custom-control-label" for="correct">{{ __('Correct') }}</label>
    </div>
    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
</form>
@stop
