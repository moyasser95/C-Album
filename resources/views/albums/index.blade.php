@extends('layouts.app')

@section('content')
    <h1>Albums</h1>

    <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">Create Album</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Pictures</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>{{ $album->name }}</td>
                    <td>
                        @foreach ($album->pictures as $photo)

                        <img style="width: 50px;" src="{{ asset('storage/images/'.$photo['Photos']) }} ">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-primary btn-m">Edit</a>
                       @include('layouts.model')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
