@if( $entity->exists )
    <form method="post" action="{{ route($update, $entity->id) }}" enctype="multipart/form-data">
        @method('put')
@else
    <form method="post" action="{{ route($store) }}" enctype="multipart/form-data">
@endif
        @csrf
        {{ $slot }}
</form>
