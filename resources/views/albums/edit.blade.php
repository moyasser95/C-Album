@extends('layouts.app')

@section('content')
    <h1>Edit Album</h1>

    <form action="{{ route('albums.update', $album->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $album->id }}">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $album->name }}" required>
        </div>

        <div class="form-group">
            <label for="pictures">Pictures</label>
            <input type="file" name="pictures[]" id="pictures" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
