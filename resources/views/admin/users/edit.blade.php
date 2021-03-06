@extends('layouts.dashboard')
@section('title', 'User ' .  $user->name)
@section('buttons')
@include('admin.partials.buttons', ['id' => $user->id, 'route' => 'users', 'exists' => $user->exists, 'isEdit' => true])
@stop
@section('content')
@component('partials.form', ['entity' => $user, 'update' => 'users.update', 'store' => 'users.store'])
    <div class="form-group">
        <label for="name">{{ __('Name') }}</label>
        <input type="text" class="form-control @iiclass('name')" name="name" id="name" value="{{ $user->name ?? old('name') }}" placeholder="{{ __('Enter name') }}">
        <div class="invalid-feedback">{{ $errors->first('name') ?? "" }}</div>
    </div>
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="active" id="active" {{ true ? 'checked="checked"' : '' }}>
        <label class="custom-control-label" for="active">{{ __('Active') }}</label>
    </div>
    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
@endcomponent
@stop
