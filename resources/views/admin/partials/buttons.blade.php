<a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route($route . '.index') }}">
    @icon("corner-left-up")
    {{ __('Back') }}
</a>
@if( $exists )
    @if( $isEdit )
    <a class="btn btn-sm btn-outline-success mr-2" href="{{ route($route . '.show', $id) }}">
        @icon("eye")
        {{ __('Show') }}
    </a>
    @else
    <a class="btn btn-sm btn-outline-success mr-2" href="{{ route($route . '.edit', $id) }}">
        @icon("edit-2")
        {{ __('Edit') }}
    </a>
    @endif
<button class="btn btn-sm btn-outline-danger mr-2">
    @icon("minus")
    {{ __('Delete') }}
</button>
@endif
