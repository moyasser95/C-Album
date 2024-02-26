@extends('layouts.app')

@section('content')
    <h1>Create Album</h1>

    <form action="{{ route('albums.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pictures">Pictures</label>
            <input type="file" name="pictures[]" id="pictures" class="form-control" multiple required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
