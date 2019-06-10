@extends('layouts.dashboard')
@section('title', 'Question ' .  $question->title)
@section('buttons')
@include('admin.partials.buttons', ['id' => $question->id, 'route' => 'questions', 'exists' => $question->exists, 'isEdit' => true])
@stop
@section('content')
<div class="row">
    <div class="col-sm">
    @if( $question->exists )
    <form method="post" action="{{ route('questions.update', $question->id) }}" enctype="multipart/form-data">
        @method('PUT')
    @else
    <form method="post" action="{{ route('questions.store') }}" enctype="multipart/form-data">
    @endif
        @csrf
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input type="text" class="form-control @iiclass('title')" name="title" id="title" value="{{ $question->title ?? old('title') }}" placeholder="{{ __('Enter title') }}">
            <div class="invalid-feedback">{{ $errors->first('title') ?? "" }}</div>
        </div>
        <div class="form-group">
            <label for="slug">{{ __('Slug') }}</label>
            <input type="text" class="form-control @iiclass('slug')" name="slug" id="slug" value="{{ $question->slug ?? old('slug') }}" placeholder="{{ __('Enter slug') }}">
            <div class="invalid-feedback">{{ $errors->first('slug') ?? "" }}</div>
        </div>
        <div class="form-group">
            <label for="image">{{ __('Image') }}</label>
            <input type="url" class="form-control" name="image" id="image" value="{{ $question->image ?? old('image') }}" placeholder="{{ __('Enter image url') }}">
        </div>
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{ $question->description ?? old('description') }}</textarea>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="active" id="active" {{ ($question->active ?? old('active')) ? 'checked="checked"' : '' }}>
            <label class="custom-control-label" for="active">{{ __('Active') }}</label>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
    </div>
    <div class="col-sm">
        @include('admin.questions.answers', ['id' => $question->id, 'answers' => $question->answers])
    </div>  
</div>  
@stop