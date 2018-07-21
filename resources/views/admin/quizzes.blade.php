@extends('layouts.dashboard')
@section('title', 'Quizzes')
@section('buttons')
<div class="btn-group mr-2">
    <button class="btn btn-sm btn-outline-secondary">Active</button>
    <button class="btn btn-sm btn-secondary">All</button>
    <button class="btn btn-sm btn-outline-secondary">Inactive</button>
</div>
<button class="btn btn-sm btn-outline-secondary">
    <span data-feather="plus"></span>
    Add
</button>
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
        <tr>
        <th scope="row">{{ $quiz->id }}</th>
        <td class="text-nowrap">{{ $quiz->slug }}</td>
        <td>{{ $quiz->name }}</td>
        <td>{{ $quiz->description }}</td>
        <td class="text-nowrap">
            <div class="btn-group" role="group" aria-label="Actions">
                <a class="btn btn-outline-secondary" href="{{route('quiz.edit', $quiz->id)}}"><i data-feather="edit-3"></i></a>
                <button type="button" class="btn btn-outline-secondary"><i data-feather="trash"></i></button>
                <button type="button" class="btn btn-success"><i data-feather="power"></i></button>
            </div>
        </td>
        </tr>
    @endforeach                    
    </tbody>
</table>
@endsection
