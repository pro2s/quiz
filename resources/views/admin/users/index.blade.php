@extends('layouts.dashboard')
@section('title', __('Users'))
@section('buttons')
<div class="btn-group mr-2">
    <button class="btn btn-sm btn-outline-secondary">{{ __('Active') }}</button>
    <button class="btn btn-sm btn-secondary">{{ __('All') }}</button>
    <button class="btn btn-sm btn-outline-secondary">{{ __('Inactive') }}</button>
</div>
@stop
@section('content')
<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">{{ __('Id') }}</th>
        <th scope="col">{{ __('Role') }}</th>
        <th scope="col">{{ __('Name') }}</th>
        <th scope="col">{{ __('Email') }}</th>
        <th scope="col">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr is="action-row" active>
        <th scope="row">{{ $user->id }}</th>
        <td>
            @foreach ($user->roles as $role)
                <span class="badge badge-dark">{{ $role->name }}</span>
            @endforeach
        </td>
        <td class="text-nowrap">{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td class="text-nowrap" slot="actions" slot-scope="{ deleteItem, toggleItem, isActive }">
            <div class="btn-group" role="group" aria-label="Actions">
                <a class="btn btn-outline-secondary" href="{{route('users.show', $user->id)}}">
                    <em data-feather="eye"></em>
                </a>
                <a class="btn btn-outline-secondary" href="{{ route('users.edit', $user->id) }}">
                    <em data-feather="edit-3"></em>
                </a>
                <button class="btn btn-outline-secondary" @click="deleteItem('{{ route('users.destroy', $user->id)  }}')">
                    <em data-feather="trash"></em>
                </button>
                <button class="btn btn-outline-secondary" url="{{ route('users.toggle', $user->id) }}" is="active-button" @action="toggleItem" :active="isActive">
                    <em data-feather="power"></em>
                </button>
            </div>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
