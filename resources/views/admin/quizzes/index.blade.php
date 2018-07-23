@extends('layouts.dashboard')
@section('title', 'Quizzes')
@section('buttons')
<div class="btn-group mr-2">
    <button class="btn btn-sm btn-outline-secondary">Active</button>
    <button class="btn btn-sm btn-secondary">All</button>
    <button class="btn btn-sm btn-outline-secondary">Inactive</button>
</div>
<a class="btn btn-sm btn-outline-secondary" href="{{ route('quizzes.create') }}">
    <span data-feather="plus"></span>
    Add
</a>
@stop
@section('content')
<table class="table">
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
        <tr is="action-row" key="{{$quiz->slug}}"> 
        <th scope="row">{{ $quiz->id }}</th>
        <td class="text-nowrap">{{ $quiz->slug }}</td>
        <td>{{ $quiz->name }}</td>
        <td>{{ $quiz->description }}</td>
        <td class="text-nowrap">
            <div class="btn-group" role="group" aria-label="Actions">
                <a class="btn btn-outline-secondary" href="{{route('quizzes.show', $quiz->id)}}">
                    <i data-feather="eye"></i>
                </a>
                <a class="btn btn-outline-secondary" href="{{route('quizzes.edit', $quiz->id)}}">
                    <i data-feather="edit-3"></i>
                </a>
                <delete-button class="btn btn-outline-secondary" url="{{route('quizzes.destroy', $quiz)}}">
                    <i data-feather="trash-2"></i>
                </delete-button>
                <button type="button" class="btn btn-{{ $quiz->active ? 'success' : 'secondary' }}">
                    <i data-feather="power"></i>
                </button>
            </div>
        </td>
        </tr>
    @endforeach                    
    </tbody>
</table>

@endsection
