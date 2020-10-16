<table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col" width="70%">Answer</th>
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
                <i data-feather="image"></i>
            </button>    
            @endif
        </td>
        <td class="text-nowrap" slot="actions" slot-scope="{ deleteItem, toggleItem, isActive }">
            <div class="btn-group" role="group" aria-label="Actions">
                <a class="btn btn-outline-secondary" href="{{ route('questions.answer.edit', [$id, $answer->id]) }}">
                    <i data-feather="edit-3"></i>
                </a>
                <button class="btn btn-outline-secondary" @click="deleteItem('{{ route('answers.destroy', $answer->id)  }}')">
                    <i data-feather="trash"></i>
                </button>
                <a class="btn btn-outline-secondary" href="{{ route('questions.answer.correct', [$id, $answer->id]) }}">
                    <i data-feather="{{ $answer->correct ? 'square' : 'check-square' }}"></i>
                </a>
                <button class="btn btn-outline-secondary" url="{{ route('answers.toggle', $answer->id) }}" is="active-button" @action="toggleItem" :active="isActive">
                    <i data-feather="power"></i>
                </button>
            </div>
        </td>
        </tr>
    @endforeach                    
    </tbody>
</table>
<a class="btn btn-primary" href="{{ route('questions.answer.create', ['question' => $id]) }}">
    <i data-feather="plus"></i> Add answer
</a>