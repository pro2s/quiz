@extends('layouts.dashboard')
@section('title', __('Questions'))
@section('buttons')
<div class="btn-group mr-2">
    <button class="btn btn-sm btn-outline-secondary">{{ __('Active') }}</button>
    <button class="btn btn-sm btn-secondary">{{ __('All') }}</button>
    <button class="btn btn-sm btn-outline-secondary">{{ __('Inactive') }}</button>
</div>
<a class="btn btn-sm btn-outline-success" href="{{ route('questions.create') }}">
    @icon("plus")
    {{ __('Add') }}
</a>
@stop
@section('content')
<table class="table" aria-describedby="main-title">
    <thead class="thead-dark">
        <tr>
        <th scope="col">{{ __('Id') }}</th>
        <th scope="col">{{ __('Slug') }}</th>
        <th scope="col">{{ __('Question') }}</th>
        <th scope="col">{{ __('Description') }}</th>
        <th scope="col">{{ __('Actions') }}</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($questions as $question)
        <tr is="action-row" {{ $question->active ? 'active' : '' }}>
        <th scope="row">{{ $question->id }}</th>
        <td class="text-nowrap">{{ $question->slug }}</td>
        <td>{{ $question->title }}</td>
        <td>{{ $question->description }}</td>
        <td class="text-nowrap" slot="actions" slot-scope="{ deleteItem, toggleItem, isActive }">
            <div class="btn-group" role="group" aria-label="Actions">
                <a class="btn btn-outline-secondary" href="{{route('questions.show', $question->id)}}">
                    @icon("eye")
                </a>
                <a class="btn btn-outline-secondary" href="{{ route('questions.edit', $question->id) }}">
                    @icon("edit-3")
                </a>
                <button class="btn btn-outline-secondary" @click="deleteItem('{{ route('questions.destroy', $question->id)  }}')">
                    @icon("trash")
                </button>
                <button class="btn btn-outline-secondary" url="{{ route('questions.toggle', $question->id) }}" is="active-button" @action="toggleItem" :active="isActive">
                    @icon("power")
                </button>
            </div>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
