<a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route($route . '.index') }}">
    <span data-feather="corner-left-up"></span>
    {{ __('Back') }}
</a>
@if( $exists )
    @if( $isEdit )
    <a class="btn btn-sm btn-outline-success mr-2" href="{{ route($route . '.show', $id) }}">
        <span data-feather="eye"></span>
        {{ __('Show') }}
    </a>
    @else
    <a class="btn btn-sm btn-outline-success mr-2" href="{{ route($route . '.edit', $id) }}">
        <span data-feather="edit-2"></span>
        {{ __('Edit') }}
    </a>
    @endif
<button class="btn btn-sm btn-outline-danger mr-2">
    <span data-feather="minus"></span>
    {{ __('Delete') }}
</button>
@endif