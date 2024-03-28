@extends('default')

@section('content')

@include('prob-notice')

@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('prizes.store') }}">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" />
    </div>
    <div class="mb-3">
        <label for="probability" class="form-label">Probability</label>
        <input type="number" name="probability" id="probability" class="form-control" min="0" max="100" placeholder="0 - 100" step="0.01" />
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

@stop
