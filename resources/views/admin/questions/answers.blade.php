<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col" class="w-75">Answer</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($answers as $answer)
        <tr is="action-row" {{ $answer->active ? 'active' : '' }}>
        <th scope="row">{{ $answer->id }}</th>
        <td>{{ $answer->answer }}</td>
        <td>
            @if ($answer->image)
            <button class="btn btn-outline-secondary" @click="viewImage('{{ $answer->image }}')">
                <em data-feather="image"></em>
            </button>
            @endif
        </td>
        <td class="text-nowrap" slot="actions" slot-scope="{ deleteItem, toggleItem, isActive }">
            <div class="btn-group" role="group" aria-label="Actions">
                <a class="btn btn-outline-secondary" href="{{ route('questions.answer.edit', [$id, $answer->id]) }}">
                    <em data-feather="edit-3"></em>
                </a>
                <button class="btn btn-outline-secondary" @click="deleteItem('{{ route('answers.destroy', $answer->id)  }}')">
                    <em data-feather="trash"></em>
                </button>
                <a class="btn btn-outline-secondary" href="{{ route('questions.answer.correct', [$id, $answer->id]) }}">
                    <em data-feather="{{ $answer->correct ? 'square' : 'check-square' }}"></em>
                </a>
                <button class="btn btn-outline-secondary" url="{{ route('answers.toggle', $answer->id) }}" is="active-button" @action="toggleItem" :active="isActive">
                    <em data-feather="power"></em>
                </button>
            </div>
        </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-primary" href="{{ route('questions.answer.create', ['question' => $id]) }}">
    <em data-feather="plus"></em> Add answer
</a>
