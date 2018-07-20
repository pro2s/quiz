@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($quizzes as $quiz)
                {{ $quiz->name }}
            @endforeach
        </div>
    </div>
</div>
@endsection
