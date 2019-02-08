@extends('layouts.dashboard')
@section('title', 'Quiz ' .  $quiz->name)
@section('buttons')
@include('admin.partials.buttons', ['id' => $quiz->id, 'route' => 'quizzes', 'exists' => $quiz->exists, 'isEdit' => true])
@stop
@section('content')
<div class="row">
    <div class="col-sm">
    @if( $quiz->exists )
    <form method="post" action="{{ route('quizzes.update', $quiz->id) }}" enctype="multipart/form-data">
        @method('PUT')
    @else
    <form method="post" action="{{ route('quizzes.store') }}" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control @iiclass('name')" name="name" id="name" value="{{ $quiz->name }}" placeholder="{{ __('Enter name') }}">
        </div>
        <div class="form-group">
            <label for="slug">{{ __('Slug') }}</label>
            <input type="text" class="form-control @iiclass('slug')" name="slug" id="slug" value="{{ $quiz->slug }}" placeholder="{{ __('Enter slug') }}">
        </div>
        <div class="form-group">
            <label for="image">{{ __('Image') }}</label>
            <input type="url" class="form-control @iiclass('image')" name="image" id="image" value="{{ $quiz->image }}" placeholder="{{ __('Enter image url') }}">
        </div>
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea class="form-control @iiclass('description')" name="description" id="description" rows="3">{{ $quiz->description }}</textarea>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="active" id="active" {{ $quiz->active ? 'checked="checked"' : '' }}>
            <label class="custom-control-label" for="active">{{ __('Active') }}</label>
        </div>
        <div class="form-group">
            <label for="started_at">{{ __('Started') }}</label>
            <input type="date" class="form-control @iiclass('started_at')" name="started_at" id="started_at" value="{{ $quiz->started_at }}" placeholder="{{ __('Enter start date') }}">
        </div>
        <div class="form-group">
            <label for="ended_at">{{ __('Ended') }}</label>
            <input type="date" class="form-control @iiclass('ended_at')" name="ended_at" id="ended_at" value="{{ $quiz->ended_at }}" placeholder="{{ __('Enter end date') }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
    </div>
    <div class="col-sm">
    <div class="card">
        <div class="card-header">{{ __('Questions') }}</div>
        @if( $quiz->exists )
            <questions-list :questions='@json($quiz->questions)' search="{{ route('questions.search') }}" delete="{{ route('quizzes.deleteQuestion', [$quiz->id, '']) }}" add="{{ route('quizzes.addQuestion', [$quiz->id, '']) }}">
            </questions-list>
        @endif
        </ul>
    </div>   
    </div>
</div>
@stop