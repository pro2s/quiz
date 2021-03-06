@extends('layouts.dashboard')
@section('title', 'Quizzes')
@section('buttons')
<div class="btn-group mr-2">
    <button class="btn btn-sm btn-outline-secondary">Active</button>
    <button class="btn btn-sm btn-secondary">All</button>
    <button class="btn btn-sm btn-outline-secondary">Inactive</button>
</div>
<a class="btn btn-sm btn-outline-secondary" href="{{ route('quizzes.create') }}">
    @icon("plus")
    Add
</a>
@stop
@section('content')
<table class="table" aria-describedby="main-title">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Slug</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($quizzes as $quiz)
        <tr is="action-row" {{ $quiz->active ? 'active' : '' }}>
        <th scope="row">{{ $quiz->id }}</th>
        <td class="text-nowrap">{{ $quiz->slug }}</td>
        <td>{{ $quiz->name }}</td>
        <td>{{ $quiz->description }}</td>
        <td class="text-nowrap" slot="actions" slot-scope="{ deleteItem, toggleItem, isActive }">
            <div class="btn-group" role="group" aria-label="Actions">
                <a class="btn btn-outline-secondary" href="{{ route('quizzes.show', $quiz->id) }}">
                    @icon("eye")
                </a>
                <a class="btn btn-outline-secondary" href="{{ route('quizzes.edit', $quiz->id) }}">
                    @icon("edit-3")
                </a>
                <button class="btn btn-outline-secondary" @click="deleteItem('{{ route('quizzes.destroy', $quiz->id)  }}')">
                    @icon("trash")
                </button>
                <button class="btn btn-outline-secondary" url="{{ route('quizzes.toggle', $quiz->id) }}" is="active-button" @action="toggleItem" :active="isActive">
                    @icon("power")
                </button>
            </div>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
