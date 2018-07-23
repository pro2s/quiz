@extends('layouts.dashboard')
@section('title', 'Quiz ' .  $quiz->name)
@section('buttons')
<a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('quizzes.index') }}">
    <span data-feather="corner-left-up"></span>
    {{ __('Back') }}
</a>
@if( $quiz->exists )
<a class="btn btn-sm btn-outline-success mr-2" href="{{route('quizzes.show', $quiz->id)}}">
    <span data-feather="eye"></span>
    {{ __('Show') }}
</a>
<button class="btn btn-sm btn-outline-danger mr-2">
    <span data-feather="minus"></span>
    {{ __('Delete') }}
</button>
@endif
@stop
@section('content')
@if( $quiz->exists )
<form method="post" action="{{ route('quizzes.update', $quiz->id) }}" enctype="multipart/form-data">
    @method('PUT')
@else
<form method="post" action="{{ route('quizzes.store') }}" enctype="multipart/form-data">
@endif
    @csrf
    <div class="form-group">
        <label for="name">{{ __('Name') }}</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $quiz->name }}" placeholder="{{ __('Enter name') }}">
    </div>
    <div class="form-group">
        <label for="slug">{{ __('Slug') }}</label>
        <input type="text" class="form-control" name="slug" id="slug" value="{{ $quiz->slug }}" placeholder="{{ __('Enter slug') }}">
    </div>
    <div class="form-group">
        <label for="image">{{ __('Image') }}</label>
        <input type="url" class="form-control" name="image" id="image" value="{{ $quiz->image }}" placeholder="{{ __('Enter image url') }}">
    </div>
    <div class="form-group">
        <label for="description">{{ __('Description') }}</label>
        <textarea class="form-control" name="description" id="description" rows="3">{{ $quiz->description }}</textarea>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="active" id="active" {{ $quiz->active ? 'checked="checked"' : '' }}>
        <label class="custom-control-label" for="active">{{ __('Active') }}</label>
    </div>
    <div class="form-group">
        <label for="started_at">{{ __('Started') }}</label>
        <input type="date" class="form-control" name="started_at" id="started_at" value="{{ $quiz->started_at }}" placeholder="{{ __('Enter start date') }}">
    </div>
    <div class="form-group">
        <label for="ended_at">{{ __('Ended') }}</label>
        <input type="date" class="form-control" name="ended_at" id="ended_at" value="{{ $quiz->ended_at }}" placeholder="{{ __('Enter end date') }}">
    </div>
    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
</form>
@endsection